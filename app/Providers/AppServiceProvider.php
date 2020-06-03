<?php

namespace App\Providers;

use App\Models\category;
use App\Models\product;
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
        $data['categories']=category::all();
        $data['product_featured']=product::where('pro_featured',1)->orderBy('pro_id','DESC')->take(6)->get();
        view()->share($data); 
    }
}
