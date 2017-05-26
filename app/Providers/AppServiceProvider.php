<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use App\Models\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $factories = Factory::all();
        view()->share([
          'factories' => $factories,
         ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
