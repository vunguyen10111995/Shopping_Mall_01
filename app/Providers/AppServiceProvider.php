<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Request $request)
    {
        
        $categories = Categories::where('parent_id', 0)->get();
        $cate_parent = Categories::where('parent_id', 1)->get();
        view()->share([
             'categories' => $categories,
             'cate_parent' => $cate_parent
         ]);
    }

    public function register()
    {
    }
}
