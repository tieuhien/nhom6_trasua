@include('page.header')
@if(Auth::user()==null||Auth::user()->position==0){
    <script type="text/javascript">window.location.href = "login";</script>
    }
@else
    <div class="container1">
       <div class="login">Quản lý sản phẩm</div>

<div style="position: absolute;right: 50px;">
   <a href="addproduct" class="submit"  title="trở về trang trước đó" style="padding:7px;background-color: #4dbd4dad !important;">Thêm sản phẩm</a>  

   <a href="{{ url()->previous() }}" class="submit"  title="trở về trang trước đó" style="padding:7px;background-color: #8a5f2db0 !important;">Quay lại</a>  
</div>











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
        <table border="1">
            <tr>
                <th>id:</th>
                <th>Tên sản phẩm:</th>
                <th>Giá:</th>
                <th>Loại sản phẩm:</th>
                <th>Size:</th>
                <th>Ảnh sản phẩm:</th>
                <th colspan="2">Hành động:</th>
            </tr>
            @foreach($products as $sp)
            <tr>  
                <td class="center">{{$sp->id}}</td>
                <td>{{$sp->name}}</td>
                <td>{{$sp->price}}đ</td>
                <td>{{$sp->catalog_id}}</td>
                <td>{{$sp->size}}</td>
                <td class="center"><img src="resource/images/products/{{$sp->image_link}}" width="60px" height="60px"></td>
                <td class="center">
                    <form method="get" action="ProductsController/{{$sp->id}}">
                    <button class="submit" type="submit" name="show" title="Có gì đó sai sai >> chỉnh sửa luôn." >Sửa</button> 
                   </form>
                   
                </td>
                <td class="center">
                    <form action="ProductsController/{{$sp->id}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="DELETE"> 
                        <button class="submit" type="submit" name="delete" title="Ngứa mắt quá.... Xóa ">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>  




        <div id="show">Hiển thị {{$products->firstItem()}}-{{$products->perPage()}} của 
       {{$products->total()}} sản phẩm </div>



  <ul class="pagi">
        <li class="pagi-item pagi-action pagi-prev is-disabled">
          <a href="{{$products->previousPageUrl()}}"><i class="fal fa-angle-left"></i></a>
        </li>
        <?php for($i=1;$i<=$products->lastPage();$i++){ ?>
        <a href="{{$products->url($i)}}"><li class="pagi-item"><?php echo $i;?> </li></a>
       <?php }; ?>

       <li class="pagi-item pagi-action pagi-next">
          <a href="{{$products->nextPageUrl()}}"> <i class="fal fa-angle-right"></i></a>
        </li>
      </ul>





    </div>
                
   <link
  rel="stylesheet"
  href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
  integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
  crossOrigin="anonymous"
/>  
<style>
.center{text-align: center;}
.container1 {width:100%; height:80%; margin:auto;background-color:#ffffffb0; font-size:15px; font-family:Arial;border-radius:10px;position: relative;z-index: 0;}
.form-group {width:80%; height:40px;outline: none; margin-top:20px;border-top: none;border-left: none; border-right: none;border-bottom:#b5b5b5d6 1px solid ; line-height: 40px;padding-left: 15px; margin: auto;font-size: 15px;font-weight: 300;}
.login {padding-top:20px; text-align:center;font-size:24px;color:#961e27; font-weight:bold;}
.submit {width:100px; height:35px; margin-top:0px; background-color: #c12a2ab0; border-radius:20px;border: #80d894d6 1px solid;color: #FFF; transition: transform .2s; }
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













table{
    padding: 0;
    border: none;
    border-collapse: collapse;
    border: 1px solid #ddd;
    width: 1170px;
    margin: 50px auto 10px;
}
table td {
    padding: 0;
    border: none;
    border-collapse: collapse;
}
a {
    color: #666;
    text-decoration: none;
}
th{background-color: #fff;}
table tr td, 
table tr th {
    border: 1px solid #ddd;
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: center;
    border-top: 1px solid #ddd;
    font-weight: normal;
}














#show{
    margin-left: 30px;margin-bottom: 10px;
}

 button {
    cursor: pointer;
  }
  
          .pagi {
            display: flex;
            width:200px;
            justify-content: center;
            position: absolute;
            bottom: 10px;
            left: 50%;
            text-align: center;
          }
          .pagi-item {
            margin: 0 1.5rem;
            font-size: 1rem;
            color: #000;
            cursor: pointer;
            transition: all 0.2s linear;
          }
          .pagi-item.is-disabled {
            opacity: 0.5;
            cursor: not-allowed;
          }
          .pagi-item:hover,
          .pagi-item.is-active {
            color: var(--primary);
          }
 li{list-style: none;}



  :root {
    --primary: #08aeea;
    --secondary: #13D2B8;
    --purple: #bd93f9;
    --pink: #ff6bcb;
    --blue: #8be9fd;
    --gray: #333;
    --font: "Poppins", sans-serif;
    --gradient: linear-gradient(40deg, #ff6ec4, #7873f5);
    --shadow: 0 0 15px 0 rgba(0,0,0,0.05);
  }
  *,
  *:before,
  *:after {
    box-sizing: border-box;
  }

</style>
@endif