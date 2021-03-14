@extends('master')
@section('content')
		
			<div class="textBox">
				<img src="resource/images/text.png" style="max-width: 90%;">
			</div>
			<div class="imgBox">
				<img src="resource/images/a.png" class="pessi"><br>
				<p id="title">Trà sữa nha đam x2 lần trân châu</p>
				<a href="#">Xem thêm</a>
			</div>
		</div>
		<ul class="thumb">
			<li><img src="resource/images/p1.png" onclick="imgSlider('resource/images/a.png');ChangeBgColor('rgb(206 193 193)');document.getElementById('title').innerHTML = 'Trà sữa nha đam x2 lần trân châu';"></li>
			<li><img src="resource/images/p2.png" onclick="imgSlider('resource/images/b.png');ChangeBgColor('rgb(230 12 44 / 43%)');document.getElementById('title').innerHTML = 'Trà xanh kiwi';"></li>
			<li><img src="resource/images/p3.png" onclick="imgSlider('resource/images/c.png');ChangeBgColor('#1e1e1e');document.getElementById('title').innerHTML = 'Trà ô long đường đen';"></li>
		</ul>
		
@endsection
