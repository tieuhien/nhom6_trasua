@include('page.header')
@if(Auth::user()==null){
	<script type="text/javascript">window.location.href = "login";</script>
	}
@else
	<?php $id=Auth::user()->id;?>
<div class="container1">

        <form action="posteditpassword"  method="post">
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
        	<div class="logo"><img src="resource/images/logo.png" alt="logo" class="logo1"></div>
	        <div class="login">Thay đổi mật khẩu</div>
	        @if(count($errors)>0)
	        	<div class="noti_err">
	        		<script>
	        			alert('@foreach($errors->all() as $err){{$err}}\n @endforeach');
					</script>	
	        	</div>
        	@endif
        	@if(Session::has('mess'))
        		<div class="noti">{{Session::get('mess')}}</div>
        	@endif
	        <div><input type="password" name="old" placeholder="Old Password" class="text"></div>
	        <div><input type="password" name="new_password" placeholder="New Password" class="text"></div>
	        <div><input type="password" name="repassword" placeholder="Re-password" class="text"></div>
	        <div style="text-align: center;"><input type="submit" name="login" class="submit" value="Thay đổi"></div>
	        <a href="{{ url()->previous() }}" rel="back" class="losspass">Quay lại</a><br>
	        <img src="resource/images/banner1.png" width="400px" style="position: absolute;bottom: 0;left: 0;z-index: -1;">
	        
        </form>


</div>
</body>
<style>

.container1 {width:400px; height:680px; margin:auto;background-color:#ffffffb0; font-size:18px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;text-align: center;position: relative;z-index: 0;}
.text {width:250px; height:40px;outline: none; margin-top:15px;border-top: none;border-left: none; border-right: none;border-bottom:#80d894d6 1px solid ; line-height: 40px;padding-left: 15px; }
.login {padding-top:0px; text-align:center;font-size:24px;color:#961e27; font-weight:bold;}
.submit {width:100px; height:35px; margin-top:20px; background-color: #c12a2ab0; border-radius:20px;border: #80d894d6 1px solid;color: #FFF; transition: transform .2s; outline: none;}
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);width: 100px;}
.noti {text-align:center; color: #fd4747d6; font-size:15px;}
#a {padding-top: 8px;}
.fogot_pass {text-decoration: none; color: #000; margin-left: 20px;font-size: 12px;transition: transform .2s;font-weight: bold;}
.fogot_pass:hover {transform: scale(1.2);}
.logo {text-align: center;}
.logo1 {width: 150px; height: 150px;}
.losspass {text-decoration: none;color:#000000db;position: relative;top: 0px; font-size: 12px;}
</style>
@endif