<?php

namespace App\Providers;

use App\Models\catalogs;
use App\Models\products;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(['addproduct','editproduct','products','search'],function($view){
            $danhmuc= catalogs::all();
            $view->with('danhmuc',$danhmuc);
        });
 
    // ham show sp ra trang products 
    view()->composer('products',function($view){
            $products= products::paginate(8); // 8 => so san pham hien thi tren 1 trang 
            $view->with('products',$products);
        });

    }
}
