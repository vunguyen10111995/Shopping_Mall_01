<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlocksController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function contact()
    {
        return view('frontend.blocks.contact');
    }
    public function about()
    {
        return view('frontend.blocks.about');
    }
}
