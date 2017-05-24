<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class BlocksController extends Controller
{
    public function index()
    {
        $category = Categories::category();
        $product = Product::product();

        return view('admin.index', compact('category', 'product'));
    }
    public function contact()
    {
        $category = Categories::category();
        $product = Product::product();

        return view('frontend.blocks.contact', compact('category', 'product'));
    }
    public function about()
    {
        $category = Categories::category();
        $product = Product::product();

        return view('frontend.blocks.about', compact('category', 'product'));
    }
}
