<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

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

    public function store(ContactRequest $request)
    {

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->txtSubject;
        $contact->company = $request->txtCompany;
        $contact->message = $request->txtMessage;
        $contact->status = 1;
        $contact->save();
        
        $category = Categories::category();
        $product = Product::product();

        return view('frontend.blocks.contact', compact('category', 'product'));
    }
}
