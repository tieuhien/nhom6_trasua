<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\catalogs;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products= products::paginate(8);//số item hiển thị trên mỗi trang = 8
        //print_r($products);
        return view('productmanager',['products'=>$products]);
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
   //------ them san pham
    public function store(Request $req)
    {
    $this->validate($req,
        [
            'name'=>'required|max:156',
            'price'=>'required',
            'size'=>'required|max:20',
            'images'=>'required|mimes:jpg,jpeg,png,gif|max:5120'
        ],
        [
            'name.required'=>'Vui lòng nhập tên sản phẩm.',
            'name.unique'=>'tên trùng với sản phẩm khác',
            'price.required'=>'Vui lòng nhập giá sản phẩm.',
            'size.required'=>'Vui lòng nhập giá trị size (phân cách nhau bởi dấu cách).',
            'images.required'=>'Vui lòng chọn ảnh sản phẩm.',
            'images.mimes'=>'Vui lòng chọn hình ảnh với đuôi .jpg .jpeg .png .gif.',
            'images.size'=>'Vui lòng chọn hình ảnh có dung lượng <5MB.',
        ]);
     $filename = $req->images->getClientOriginalName();
     $req->images->move(public_path('/resource/images/products'), $filename);

     $product = new Products();
     $product->name = $req->name;
     $product->price = $req->price;
     $product->catalogs_id = $req->catalog;
     $product->size = $req->size;
     $product->image_link = $filename;
     $product->save();
     return redirect()->back()->with('mess','Đã đăng sản phẩm.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $products= Products::find($id);
        //print_r($products);
        return view('editproduct',['products'=>$products]);
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


    ////----- sửa sp
    public function update(Request $req, $id)
    {
            $this->validate($req,
        [
            'name'=>'required|max:156',
            'price'=>'required',
            'size'=>'required|max:20',
           
        ],
        [
            'name.required'=>'Vui lòng nhập tên sản phẩm.',
            'name.unique'=>'tên trùng với sản phẩm khác',
            'price.required'=>'Vui lòng nhập giá sản phẩm.',
            'size.required'=>'Vui lòng nhập giá trị size (phân cách nhau bởi dấu cách).',
            
            
        ]);
     $product = Products::find($id);
     $product->name = $req->name;
     $product->price = $req->price;
     $product->catalogs_id = $req->catalog;
     $product->size = $req->size;
     $product->save();
     return redirect()->back()->with('mess','Đã cập nhật sản phẩm.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('mess','Đã xóa sản phẩm.');
    }
}
