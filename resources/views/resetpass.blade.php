@include('page.header')
	
<div class="container1">

        <form method="post">
        	<div class="logo"><img src="resource/images/logo.png" alt="logo" class="logo1"></div>
	        <div class="login">Đặt lại mật khẩu</div>
	        <div><input type="text" name="email" placeholder="email" class="text"></div>
	        <div style="text-align: center;"><input type="submit" name="login" class="submit" value="Reset"></div>
	         <a href="register" rel="Đăng ký" class="losspass">Đăng ký &#45;</a><a href="login" rel="Đăng nhập" class="losspass">  Đăng nhập</a><br>
	        <img src="resource/images/banner1.png" width="400px" style="position: absolute;bottom: 0;left: 0;">
	        
        </form>

<div class="noti">
<?php 
session_start();
if (!empty($_SESSION['user'])) header('location:myaccount.php'); 
//include('act.php');
   if(isset($_POST['login']))
	{
	   if(empty($_POST['stk'])||empty($_POST['password'])) echo "Quý khách vui lòng nhập đầy đủ thông tin đăng nhập!";
	   else
	   {
	   $test=select_user($_POST['stk'],$_POST['password']);
	 }}
?>
</div>
</div>
</body>
<style>

.container1 {width:400px; height:640px; margin:auto;background-color:#ffffffb0; font-size:18px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;text-align: center;position: relative;}
.text {width:250px; height:40px;outline: none; margin-top:20px;border-top: none;border-left: none; border-right: none;border-bottom:#80d894d6 1px solid ; line-height: 40px;padding-left: 15px; }
.login {padding-top:20px; text-align:center;font-size:24px;color:#961e27; font-weight:bold;}
.submit {width:100px; height:35px; margin-top:20px; background-color: #c12a2ab0; border-radius:20px;border: #80d894d6 1px solid;color: #FFF; transition: transform .2s; }
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);width: 100px;outline: none;}
.noti {text-align:center; color: #fd4747d6; font-size:15px;}
#a {padding-top: 8px;}
.fogot_pass {text-decoration: none; color: #000; margin-left: 20px;font-size: 12px;transition: transform .2s;font-weight: bold;}
.fogot_pass:hover {transform: scale(1.2);}
.logo {text-align: center;}
.logo1 {width: 150px; height: 150px;}

.losspass {text-decoration: none;color:#000000db;position: relative;top: 0px; font-size: 12px;}
</style>
<?php ob_end_flush(); ?>
</html>