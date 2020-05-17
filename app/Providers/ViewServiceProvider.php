<?php

namespace App\Providers;

use App\Blog;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        accepts two arguments 1st is view and 2nd is callback function
        View::composer('partials.meta_dynamic', function($view){
            return $view->with('blog', Blog::all());
        });
    }
}
