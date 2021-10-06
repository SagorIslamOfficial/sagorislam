<?php

namespace App\Providers;

use App\Models\Home;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
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
//        View::composer('*', function ($view){
//            $home = Home::latest()->first();
//            if (!empty($home)){
//                $icons = explode(',',$home->social_icon);
//                $links = explode(',',$home->social_link);
//            }else{
//                $icons = [];
//                $links = [];
//            }
//            return $view->with('home', 'icons', 'links', $home, $icons, $links);
//        });
//        View::share(['home', 'icons', 'links'], Home::latest()->first());
    }
}
