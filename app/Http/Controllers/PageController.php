<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        $category=Category::all();
        $product=Product::paginate(6);

        return view('shop', compact('product', 'category'));
    }

    //particular product page
    public function product($id){
        $product= Product::find($id);
        return view('product', compact('product'));
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
    public function searchCategory($id){
        $category=Category::all();
        $product = Product::whereHas('category', function ($query) use ($id){
            $query->where('category_id', $id);
        })->paginate(6);

        return view('shop', compact('product', 'category'));
    }
}
