<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\View;
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
        view()->composer('front._right_side',function ($view){
            $data['popular_posts']=Post::published()->orderBy('total_hit', 'desc')->limit(3)->get();
            $data['categories']=Category::all();
            $view->with($data);
        });
    }
}
