<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;

class PageController extends Controller
{
    public function index(){
        $category=Category::all();
        return view('index', compact('category'));
    }

    //about-us page
    public function about(){
        $category=Category::all();
        return view('about', compact('category'));
    }

    //contact page
    public function contact(){
        $category=Category::all();
        return view('contact', compact('category'));
    }

    //shop page
    public function shop(){
        $category=Category::all();
        $product=Product::paginate(6);

        return view('shop', compact('category', 'product'));
    }

    //particular product page
    public function product($id){
        $category=Category::all();
        $product= Product::find($id);
        return view('product', compact('product', 'category'));
    }

    //shop page after searching a product
    public function search(Request $request){
        $category=Category::all();
        $search=$request->search;
        $product=Product::where('name', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->paginate(6);
        return view('shop', compact('product', 'category'));
    }

    //shop page but sorting from Max price to Min price
    public function sortMaxtoMin(){
        $category=Category::all();
        $product = Product::orderBy('price', 'DESC')->paginate(6);
        return view('shop', compact('product', 'category'));
    }

    //shop page but sorting from Min price to Max price
    public function sortMintoMax(){
        $category=Category::all();
        $product = Product::orderBy('price', 'ASC')->paginate(6);
        return view('shop', compact('product', 'category'));
    }

    //shop page but filtering by category
    public function searchCategory($name){
        $category=Category::all();
        $product = Product::whereHas('category', function ($query) use ($name){
            $query->where('name', $name);
        })->paginate(6);

        return view('shop', compact('product', 'category'));
    }

    //cart page
    public function cart(){
        if (Auth::id()){
            $category=Category::all();
            $id = Auth::user()->id;
            $cart = cart::where('user_id','=', $id)->get();
            return view('cart', compact('category', 'cart'));
        }
        else{
            return redirect('login');
        }  
    }

    //remove from cart
    public function removeCart($id){
        $cart = cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    //add products to the cart
    public function addCart(Request $request, $id){
        if (Auth::id()){
            $user = Auth::user();
            $product = Product::find($id);

            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->name;
            $cart->price = $product->price * $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect('cart');
        }
        else{
            return redirect('login');
        }
    }

    //checkout using cash
    public function cashOrder(){
        $category=Category::all();

        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id','=',$userid)->get();

        foreach ($data as $data){
            $order = new Order;

            $order->name = $data->name; //here data is taking input from cart table
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'COD';
            $order->delivery_status = 'Processing';

            $order->save();

            //to delete data from cart once it is proceeded to checkout
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        $adminUser = User::where('is_admin', 1)->get();
        // Notification::send($user, new AdminNotification($user));
        Notification::send($adminUser, new AdminNotification($user));
        return redirect()->back()->with('message', 'Your order is received. Delivery will be very soon');
    }

    //to pay using card
    public function checkout($totalprice){
        $category=Category::all();
        return view ('checkout', compact('totalprice', 'category'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => ($totalprice+100) * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for the payment" 
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id','=',$userid)->get();

        foreach ($data as $data){
            $order = new Order;

            $order->name = $data->name; //here data is taking input from cart table
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Paid';
            $order->delivery_status = 'Processing';

            $order->save();

            //to delete data from cart once it is proceeded to checkout
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        // Session::flash('success', 'Payment successful!');
      
        return back()->with('success', 'Payment successful!');;
    }

    //mark as read for the notifications
    public function markasred($id){
        if($id){
            auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        return back();
    }

    //to add the comment
    public function addComment(Request $request){
        if (Auth::id()){
            $comment = new Comment;
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
    
}
