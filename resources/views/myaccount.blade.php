@include('page.header')
@if(Auth::user()==null){
    <script type="text/javascript">window.location.href = "login";</script>
    }
@else
    <div class="container1">
                <div class="logo"><img src="resource/images/logo.png" alt="logo" class="logo1"></div>
                <div class="login">Thông tin cá nhân</div>
                <div class="form-group"><p>ID: {{Auth::user()->id}}</p>         </div>
                <div class="form-group"><p>Họ tên: {{Auth::user()->name}}</p> </div>
                <div class="form-group"><p>Email: {{Auth::user()->email}}</p>        </div>
                <div class="form-group"><p>Số điện thoại: {{Auth::user()->phone}}</p> </div>
                <div class="form-group"><p>Địa chỉ: {{Auth::user()->address}}</p> </div>
                <div class="form-group"><p>Ngày tạo: {{Auth::user()->created_at}}</p>     </div>
                <div class="form_bottom">
                    <?php $id=Auth::user()->id;?>

                 @if(Auth::user()->position==1)
                        <a href="productmanager" title="quản lý sản phẩm"><button class="submit" type="submit" name="logout">Sản phẩm</button></a>
                        <a href="usermanager" title="quản lý thành viên"><button class="submit" type="submit" name="logout">Thành viên</button></a>
                @endif
                <a href="UsersController/{{Auth::user()->id}}"><button class="submit" type="submit" name="edit" title="Có gì đó sai sai >> chỉnh sửa luôn.">Chỉnh sửa</button> </a>

                <a href="logout"><button class="submit" type="submit" name="logout">Đăng xuất</button></a>

                </div>
                <a href="editpassword?id=<?php echo $id; ?>" class="losspass">Bạn cảm thấy tài khoản không còn an toàn nữa? Đổi mật khẩu ngay.</a>
    </div>
<style>

.container1 {width:70%; height:640px; margin:auto;background-color:#ffffffb0; font-size:18px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;position: relative;z-index: 0;}
.form-group {width:80%; height:40px;outline: none; margin-top:20px;border-top: none;border-left: none; border-right: none;border-bottom:#b5b5b5d6 1px solid ; line-height: 40px;padding-left: 15px; margin: auto;font-size: 15px;font-weight: 300;}
.login {padding-top:20px; text-align:center;font-size:24px;color:#961e27; font-weight:bold;}
.submit {width:100px; height:35px; margin-top:20px; background-color: #c12a2ab0; border-radius:20px;border: #80d894d6 1px solid;color: #FFF; transition: transform .2s; }
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);width: 100px;outline: none;}
.noti {text-align:center; color: #fd4747d6; font-size:15px;}
#a {padding-top: 8px;}
.fogot_pass {text-decoration: none; color: #000; margin-left: 20px;font-size: 12px;transition: transform .2s;font-weight: bold;}
.fogot_pass:hover {transform: scale(1.2);}
.logo {text-align: center;}
.logo1 {width: 150px; height: 150px;}
.form_bottom{width:100%; text-align: center; display: flex;
    align-items: center;justify-content: center;}
.losspass {width: 450px;text-decoration: none;color: #000000db;font-size: 12px;margin: auto;text-align: center;display: flex;margin-top: 20px;
}
</style>
@endif