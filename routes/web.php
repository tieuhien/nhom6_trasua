<?php
use App\Http\Controlers\ProductsController;
use App\Http\Controlers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {return view('welcome');});


Route::get('products',function(){return view('products');});
//Route::get('/shop',[ControllerProducts::class,'shop']);
Route::get('/shop', 'App\Http\Controllers\ProductsController@index')->name('shop');
route::get('/',['as'=>'trang-chu','uses'=>'App\Http\Controllers\PageController@getIndex']);
Route::get('login',function(){return view('login');});
Route::get('contact',function(){return view('contact');});
Route::get('about',function(){return view('about');});
Route::get('register',function(){return view('register');});
Route::get('resetpass',function(){return view('resetpass');});
Route::post('register','App\Http\Controllers\PageController@postRegister')->name('dang-ky');//sự kiện click button đăng ký
Route::post('login','App\Http\Controllers\PageController@postLogin')->name('dang-nhap'); //sự kiện click đăng nhâp
Route::get('myaccount',function(){return view('myaccount');}); // trang tài khoản
Route::get('logout','App\Http\Controllers\PageController@getLogout')->name('dang-xuat');// route đăng xuất
Route::get('editaccount',function(){return view('editaccount');});
//Route::post('runeditaccount','App\Http\Controllers\UsersController')->name('cap-nhat'); //sự kiện click cập nhật
Route::resource('UsersController','App\Http\Controllers\UsersController');
Route::get('editpassword',function(){return view('editpass');});
Route::post('posteditpassword','App\Http\Controllers\PageController@editpassword');// route đỏi mk
Route::get('addproduct',function(){return view('addproduct');});
Route::resource('ProductsController','App\Http\Controllers\ProductsController');// 
Route::resource('productmanager','App\Http\Controllers\ProductsController');// quanr lys sanr phaamr
Route::resource('editproduct','App\Http\Controllers\ProductsController');// Sửa sản phẩm
Route::resource('usermanager','App\Http\Controllers\UsersController');


Route::get('searchC','App\Http\Controllers\PageController@getSearch');
Route::get('search',function(){return view('search');});