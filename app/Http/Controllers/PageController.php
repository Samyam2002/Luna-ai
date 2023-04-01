<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //shop page
    public function shop(){
        // $category=Category::all();
        // $product=Product::paginate(6);

        // return view('shop', compact('product', 'category'));
        return view('shop');
    }
}
