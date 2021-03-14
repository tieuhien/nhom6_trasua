<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\catalogs;
use App\Models\oder_details;
use App\Models\personnels;
use App\Models\transactions;
use App\Models\users;
use Hash;
use Auth;
use Carbon;
use App\News;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){return view('page.index');}

    ////////// đăng ký

    public function postRegister(Request $req){
    	$this->validate($req,
    	[
    		'email'=>'required|email|unique:users,email',
    		'password'=>'required|min:8|max:255',
    		'fullname'=>'required',
    		'repassword'=>'required|same:password'
    	],
    	[
    		'email.required'=>'Vui lòng nhập email.',
    		'email.email'=>'Không đúng định dạng email.',
    		'email.unique'=>'Email đã được đăng ký bởi người dùng khác',
    		'password.required'=>'Vui lòng nhập mật khẩu.',
    		'repassword.same'=>'Mật khẩu không khớp.',
    		'password.min'=>'Mật khẩu ít nhất 8 ký tự.'    	
    	]);
     $user =new users();
     $user->name = $req->fullname;
     $user->email = $req->email;
     $user->password = Hash::make($req->password);
     $user->save();
     return redirect()->back()->with('thanhcong','Đăng ký thành công.');
    }


////// đăng nhập

    public function postLogin(Request $req){
    	$this->validate($req,
    	[
    		'email'=>'required|email',
    		'password'=>'required|min:8|max:255',
    		
    	],
    	[
    		'email.required'=>'Vui lòng nhập email.',
    		'email.email'=>'Không đúng định dạng email.',
    		'password.required'=>'Vui lòng nhập mật khẩu.',
    		'password.min'=>'Mật khẩu ít nhất 8 ký tự.',
    		'password.max'=>'Mật khẩu tối đa 255 ký tự.'   	
    	]);
    	$credentials =  array('email' =>$req->email,'password'=>$req->password);
    	if(Auth::attempt($credentials)){
    		return redirect()->back();
    	}
    	else{
    		return redirect()->back()->with('massage',' Đăng nhập thất bại.');
    	}
    }


    /// đăng xuất
     public function getLogout(){
     	Auth::logout();
     	return redirect('/');
     }




     //////// đổi mật khẩu

      public function editpassword(Request $req)
    {
        $id=Auth::user()->id;
        $active = $req->has('active')? 1 : 0;
        $this->validate($req,
        [
            'old'=>'required|min:8|max:255',
            'new_password'=>'required|min:8|max:255',
            'repassword'=>'required|same:new_password',
        ],
        [
            'old.required'=>'Vui lòng nhập đầy đủ các trường.',
            'repassword.same'=>'Mật khẩu không khớp.',
            'old.min'=>'Mật khẩu ít nhất 8 ký tự.',
            'new_password.required'=>'Vui lòng nhập mật khẩu mới.',
            'repassword.required'=>'Vui lòng nhập lại mật khẩu mới.',
            'new_password.min'=>'Mật khẩu ít nhất 8 ký tự.',
            'new_password.max'=>'Mật khẩu tối đa 255 kí tự.'   
        ]);
       echo $update = users::find($id);
        $update->password = Hash::make($req->repassword);
        $update->updated_at=\Carbon\Carbon::now();
        $update->save();
        
        Auth::logout();
        return redirect('login');
        return redirect()->back()->with('mess', 'Cập nhật mật khẩu thành công.');
        
    }




    public function getSearch(Request $req){
        $products= Products::Where('name','like','%'.$req->key.'%')
                            ->get();
        return view('search',compact('products'));
    }








}

