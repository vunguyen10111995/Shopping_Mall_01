<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Mail;
use App\Models\Subcrice;

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
        $category = Categories::category();
        $product = Product::product();

        $email = $request->email;
        Mail::send('mail.mail', [
            'name' => $request->name,
            'email' => $request->email
        ], function ($message) use ($email) {
            $message->to($email, 'Reply')->subject('Cảm ơn bạn đã liên hệ với chúng tôi!');
        });

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->txtSubject;
        $contact->company = $request->txtCompany;
        $contact->message = $request->txtMessage;
        $contact->status = 1;
        $contact->save();

        return view('frontend.blocks.contact', compact('category', 'product'));
    }

    public function subcrice(Request $request)
    {
        $subCrice = new Subcrice;
        $category = Categories::category();
        $product = Product::product();
        $email = $request->email;

        Mail::send('mail.subcrice', [
            'email' => $request->email
        ], function ($message) use ($email) {
            $message->to($email, 'Reply')->subject('Cảm ơn bạn đã liên hệ với chúng tôi!');
        });

        return view('frontend.index', compact('category', 'product'));
    }
}
