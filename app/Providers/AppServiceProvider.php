<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Factory;
use App\Models\Size;
use App\Models\Colors;
use App\Models\Like;
use Illuminate\Http\Request;
use DB;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $categories = Categories::where('parent_id', 0)->get();
        $products = DB::table('products')
                    ->select('product_name', 'product_image', 'price')
                    ->orderby('id', 'DESC')->skip(0)->take(3)->get();
                    
        $product = Product::skip(0)->take(4)->get();
        $productmenu = DB::table('products')->paginate(8);
        $sale = DB::table('products')
               ->where('saleoff', '>', '0')
               ->orderby('saleoff', 'DESC')
               ->select('product_name', 'product_image', 'price')->skip(0)->take(4)->get();
               
        $size = Size::all();
        $color = Colors::all();
        $factories = Factory::select('factory_name', 'id')->get();
        $factory = Factory::all();
        view()->share([
         'categories' => $categories,
         'productmenu' => $productmenu,
         'sale' => $sale,
         'factories' => $factories,
         'products' => $products,
         'size' => $size,
         'color' => $color,
         'product' => $product,
         'factory' => $factory,
        ]);
        $count = Cart::count();
        $factories = Factory::all();
        view()->share([
          'factories' => $factories,
          'count' => $count,
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
