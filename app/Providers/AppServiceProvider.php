<?php

namespace App\Providers;

use App\Brand;
use App\Category;
use App\Logo;
use App\marquee;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
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
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $view->with('categories',Category::where('publication_status',1)->get());
            $view->with('brands',Brand::where('publication_status',1)->get());
            $view->with('marque',marquee::where('publication_status',1)->orderby('id','desc')->take(1)->first());
            $view->with('logos',Logo::where('publication_status',1)->orderby('id','desc')->take(1)->first());
        });

    }
}
