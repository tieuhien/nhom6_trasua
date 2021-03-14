@include('page.header')
@if(Auth::user()==null){
    <script type="text/javascript">window.location.href = "login";</script>
    }
@else
 <?php  ?>
    <div class="container1">
            <form method="post" action="/public/ProductsController/{{$products->id}}" enctype="multipart/form-data">
                <div class="login">Sửa sản phẩm</div><br> 
                <div class="logo"><img src="/public/resource/images/products/{{$products->image_link}}" alt="logo" class="logo1"></div>
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
              
                <div class="form-group"><p>Tên hiển thị: <input type="text" name="name" class="input1" autofocus placeholder="vd: Trà sữa phân châu mattra" value="{{$products->name}}"> </p> </div>
                <div class="form-group"><p>Giá: <input type="number" name="price" class="input1" placeholder="50000" value="{{$products->price}}"></p></div>
                <!--<div class="form-group"><p>Mô tả: <input type="hidden" name="" class="input1"></p></div>-->
                <div class="form-group"><p>Thuộc danh mục:
                    <select name="catalog">
                        @foreach($danhmuc as $loai)
                        <option value="{{$loai->id}}" <?php if($products->catalogs_id==$loai->id) {echo"selected"; } ?>>{{$loai->name}}</option>
                        @endforeach
                    </select>

                 </p> </div>
                <div class="form-group"><p>Size: <input type="text" name="size" class="input1" title="Phân cách nhau bởi dấu cách" placeholder="S M L" value="{{$products->size}}"></p> </div>
                <div class="form-group"><p>Ảnh sản phẩm: <input type="file" name="images" class="input1"   multiple></p> </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT"> 
                <div class="form_bottom">
                    <button class="submit" type="submit" name="edit" formmethod="post" title="Lưu sản phẩm luôn.">Cập nhật</button> 
                    <a href="{{ url()->previous() }}" class="submit"  title="trở về trang trước đó" style="text-decoration: none;font-size: 13px;font-weight: 300;padding-top: 0px;">Quay lại</a>  
                </div>
            </form> 
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
.logo1 {width: 150px; height: 150px;border-radius: 50%;}
.form_bottom{width:100%; text-align: center; display: flex;
    align-items: center;justify-content: center;}
.losspass {width: 450px;text-decoration: none;color: #000000db;font-size: 12px;margin: auto;text-align: center;display: flex;margin-top: 20px;
}
</style>
@endif