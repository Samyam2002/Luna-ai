<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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

    //cart page
    public function cart(){
        $category=Category::all();
        return view('cart', compact('category'));
    }

    //checkout page
    public function checkout(){
        $category=Category::all();
        return view('checkout', compact('category'));
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

    public function addCart($id){
        if (Auth::id()){
            return redirect() -> back();
        }
        else{
            return redirect('login');
        }
    }
}
