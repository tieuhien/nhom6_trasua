@include('page.header')
@if(Auth::user()==null){
    <script type="text/javascript">window.location.href = "login";</script>
    }
@else

    <?php if(Auth::user()->position==0){ ?>
        
 <?php }?>
    <div class="container1">
            <form method="post" action="{{$users->id}}" >
                <div class="logo"><img src="/public/resource/images/logo.png" alt="logo" class="logo1"></div>
                <div class="login">Chỉnh sửa thông tin</div><br>
                <input type="hidden" name="_method" value="PUT">
                @if(count($errors)>0)
                <div class="noti_err">
                    <script>
                        alert('@foreach($errors->all() as $err){{$err}}\n @endforeach');
                    </script>   
                    </div>
                @endif
                @if(Session::has('mess'))
                    <div class="noti">&#33;{{Session::get('mess')}}</div>
                @endif
                <div class="form-group"><p>Họ tên: <input type="text" name="name" class="input1" value="{{$users->name}}" autofocus> </p> </div>
                <div class="form-group"><p>Email: <input type="email" name="email" class="input1" value="{{$users->email}}"> </p> </div>
                <div class="form-group"><p>Số điện thoại: <input type="text" name="phone" class="input1" value="{{$users->phone}}"> </p> </div>
                <div class="form-group"><p>Địa chỉ: <input type="text" name="address" class="input1" value="{{$users->address}}"> </p> </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form_bottom">
                    <button class="submit" type="submit" name="edit" formmethod="post" title="Lưu kết quả chỉnh sửa luôn.">Cập nhật</button> 
                    <a href="{{ url()->previous() }}" class="submit"  title="trở về trang trước đó" style="text-decoration: none;font-size: 13px;font-weight: 300;padding-top: 7px;">Quay lại</a>  
                </div>
            </form>
                <a href="editpassword?id=<?php echo $users->id; ?>" class="losspass" >Bạn cảm thấy tài khoản không còn an toàn nữa? Đổi mật khẩu ngay.</a>
    </div>
<style>

.container1 {width:70%; height:640px; margin:auto;background-color:#ffffffb0; font-size:18px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;position: relative;z-index: 0;}
.form-group {width:80%; height:40px;outline: none; margin-top:20px;border-top: none;border-left: none; border-right: none;border-bottom:#b5b5b5d6 1px solid ; line-height: 40px;padding-left: 15px; margin: auto;font-size: 15px;font-weight: 300;}
.input1{background-color: transparent;border: none; padding-left: 10px;width: 80%;outline: none;caret-color: red;}
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