<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PaymentRequest;
use App\Models\Contact;
use App\Models\Deliver;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Order_detail;
use Auth;
use Mail;
use DB;
use Cart;
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

        return view('frontend.blocks.contact', compact('category', 'product'))
            ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
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

        return view('frontend.index', compact('category', 'product'))
            ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
    }

    public function addCart($id, Request $request)
    {
        $productBy = Product::where('id', $id)->first();
        $color = $request->color;
        $size = $request->size;
        $qty = $request->qty;
        Cart::add([
                'id' => $id,
                'name' => $productBy->product_name,
                'qty' => $qty,
                'price' => $productBy->price,
                'options' => [
                    'size' => $size,
                    'color' => $color
                ]
            ]);

        $content = Cart::content();

        return redirect()->route('cart');
    }

    public function cart()
    {
        $category = Categories::category();
        $product = Product::product();
        $content = Cart::content();
        $total = Cart::subTotal();
        $count = Cart::count();

        return view('frontend.blocks.addcart', compact('category', 'content', 'total', 'count'));
    }

    public function deleteCart($id)
    {
        Cart::remove($id);
        
        return redirect()->route('cart');
    }

    public function updateCart(Request $request, $id)
    {
        if ($request->ajax()) {
            $total = $request->qty * $request->price;
            Cart::update($id, ['qty' => (int)$request->qty]);

            return $total;
        }
    }

    public function paymentShop(Request $request)
    {
        $category = Categories::category();
        $product = Product::product();
        $delive = Deliver::all();
        $cart = Cart::content();
        $total = Cart::subTotal();
        $count = Cart::count();
    
        return view('frontend.blocks.payment', compact(
            'category',
            'product',
            'delive',
            'cart',
            'total',
            'count'
        ));
    }

    public function paymentShopping(PaymentRequest $request)
    {
        DB::beginTransaction();
        try {
            $order = new Order;
            $orderDetail = new Order_detail;
            $order->user_id = $request->id;
            $order->username = $request->txtname;
            $order->email = $request->email;
            $order->mobile = $request->phone;
            $order->request = $request->request1;
            $order->total = 1;
            $order->save();

            $Cart = Cart::content();
            $data = collect();
            foreach ($Cart as $key => $item) {
                $item_temp['order_id'] = $order->id;
                $item_temp['product_id'] = $item->id;
                $item_temp['price'] = $item->price;
                $orderDetail::insert($item_temp);
            }

            DB::commit();

            $email = $request->email;
            Mail::send('mail.order', [
                'name' => $request->txtname,
                'email' => $request->email,
                'Cart' => Cart::content(),
                'total' => Cart::subTotal(),
                'count' => Cart::count(),
                'email' => $request->email,
                'mobile' => $request->phone,
                'address' => $request->txtaddress,
                ], function ($message) use ($email) {
                    $message->to($email, 'Reply')
                        ->subject('Cảm ơn bạn đã đặt hàng tại shop của chúng tôi!!');
                });

            Cart::destroy();

            return redirect()->route('payment-shop')
                ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with([
                'flash_level' => 'warning',
                'flash_message' => trans('frontend.order-fail'),
            ]);
        }
    }

    public function addWish($id, Request $request)
    {
        $wish = new Wishlist;
        $productBy = Product::where('id', $id)->first();
        $wish->user_id = $request->idwish;
        $wish->product_id = $productBy->id;
        $wish->save();

         Cart::instance('wishlist')->add([
                'id' => $id,
                'name' => $productBy->product_name,
                'qty' => 1,
                'price' => $productBy->price,
            ]);
         
        $content = Cart::instance('wishlist')->content();
        
        return redirect()->route('wishlist');
    }

    public function wishList()
    {
        $category = Categories::category();
        $product = Product::product();
        $content = Cart::instance('wishlist')->content();
        
        return view('frontend.blocks.wishlist', compact('category', 'content'));
    }

    public function deleteWish($id, Request $request)
    {
        Cart::instance('wishlist')->remove($id);

        return redirect()->route('wishlist')
            ->with([
                'flash_level' => 'success',
                'flash_message' => trans('messages.success')
            ]);
    }
}
