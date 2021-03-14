<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DingTea</title>
	<link rel="stylesheet" type="text/css" href="resource/style.css">
	<script type="text/javascript">
		function imgSlider(linkanh){
			document.querySelector('.pessi').src = linkanh;
		}
		function ChangeBgColor(color){
			const sec = document.querySelector('.sec');
			sec.style.background= color;
		}
		function menuToggle(){
			const toggleMenu = document.querySelector('.toggleMenu');
			const navigation = document.querySelector('.navigation');
			toggleMenu.classList.toggle('active');
			navigation.classList.toggle('active');
		}
	</script>
</head>
<body>
	<div class="background"></div>
	<section class="sec">
		<div class="background"></div>
		<header>
			<a href="/"><img src="resource/images/logo.png" class="logo"></a>
			<div class="toggleMenu" onclick="menuToggle();">
				<ul class="navigation">
					<li><a href="/" data-text="Home">		Home		</a></li>
					<li><a href="products" data-text="Products">	Products 	</a></li>
					@if(Auth::check())
						<li><a href="myaccount" data-text="My acount">	My account 	</a></li>
					@else
						<li><a href="login" data-text="Login">	Login 	</a></li>
					@endif
					
					<li><a href="contact" data-text="Contact">	Contact 	</a></li>
					<li><a href="about" data-text="About">	About		</a></li>
				</ul>
			</div>
		</header>
		<div class="content">