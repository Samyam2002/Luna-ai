<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //about-us page
    public function about(){
        return view('about');
    }

    //contact page
    public function contact(){
        return view('contact');
    }

    //cart page
    public function cart(){
        return view('cart');
    }

    //shop page
    public function shop(){
        // $category=Category::all();
        // $product=Product::paginate(6);

        // return view('shop', compact('product', 'category'));
        return view('shop');
    }
}
