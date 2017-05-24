<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categories::category();
        $product = Product::product();
                
        return view('frontend.index', compact('product', 'category'));
    }
    public function login()
    {
        return view('home');
    }
}
