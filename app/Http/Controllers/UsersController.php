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
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users= users::paginate(8);//số item hiển thị trên mỗi trang = 8
        //print_r($products);
        return view('usermanager',['users'=>$users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function show($id)
    {
         $users= users::find($id);
        //print_r($products);
        return view('editaccount',['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $active = $req->has('active')? 1 : 0;
        $this->validate($req,
        [
            'email'=>'required|email|max:80',
            'name'=>'required|min:8|max:255'
        ],
        [
            'email.required'=>'Vui lòng nhập email.',
            'email.email'=>'Không đúng định dạng email.',
            'email.unique'=>'Email đã được đăng ký bởi người dùng khác',
            'name.required'=>'Vui lòng nhập tên người dùng.',
            'name.min'=>'Tên người dùng quá ngắn (min=8).',
            'name.max'=>'Tên người dùng quá dài.'     
        ]);
        $update = users::find($id);
        $update->name = $req->name;
        $update->email=$req->email;
        $update->phone=$req->phone;
        $update->address=$req->address;
        $update->updated_at=\Carbon\Carbon::now();
        $update->save();
        return redirect()->back()->with('mess', 'Cập nhật thông tin thành công.');

    }



   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy($id)
    {
        $user = users::find($id);
        $user->delete();
        return redirect()->back()->with('mess','Đã xóa người dùng.');
    }
}
