<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\PDF;

class AdminController extends Controller
{
    //for authorization
    public function index()
    {
        $is_admin=Auth::user()->is_admin;

        if($is_admin=='1')
        {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();

            $order = Order::all();
            $total_revenue = 0;
            foreach($order as $order){
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.index', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        }
        else
        {
            return view('index');
        }
    }

    //to see all the categories
    public function category()
    {
        $data=Category::all();
        return view ('admin.category', compact('data'));
    }

    //to add a new category
    public function addCategory(Request $request)
    {
        $data = new Category;
        $data->name=$request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category added successfully!!!');
    }

    //to update a category
    public function updateCategory($id){
        $category=Category::find($id);
        return view('admin.update-category', compact('category'));
    }

    public function editCategory(Request $request, $id)
    {
        $category=Category::find($id);

        $category->name=$request->name;
        $category->save();

        return redirect()->back()->with('message', 'Category updated successfully');
    }
    
    //to delete a category
    public function deleteCategory($id)
    {   
        $data=Category::find($id);       
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted successfully!!!');
    }

    //to show "add product" page
    public function createProduct()
    {
        $category = Category::all();
        return view('admin.add-product', compact('category'));
    }

    //to add a new Product
    public function addProduct(Request $request)
    {
        $product = new Product;

        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->category_id=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;

        $vimage=$request->vimage;
        $vimagename=time().'.'.$vimage->getClientOriginalExtension();
        $request->vimage->move('product', $vimagename);
        $product->vimage=$vimagename;

        $product->save();
        
        return redirect()->back()->with('message', 'Product added successfully!!!');
    }

    //to show "manage product" page with update and delete options
    public function manageProduct()
    {
        $product = Product::all();
        return view('admin.manage-product', compact('product'));
    }

    //to delete a product
    public function deleteProduct($id)
    {   
        $product=Product::find($id);       
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully!!!');
    }

    //to update a product details
    public function updateProduct($id){
        $product=Product::find($id);
        $category=Category::all();
        return view('admin.update-product', compact('product', 'category'));
    }

    public function editProduct(Request $request, $id)
    {
        $product=Product::find($id);

        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->category_id=$request->category;

        $image=$request->image;
        if ($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);

            $product->image=$imagename;
        }

        $vimage=$request->vimage;
        if ($vimage){
            $vimagename=time().'.'.$vimage->getClientOriginalExtension();
            $request->vimage->move('product', $vimagename);

            $product->vimage=$vimagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product updated successfully');
    }

    //to manage order
    public function order(){
        $order = Order::all();
        return view('admin.order', compact('order'));
    }

    //When delivered, change the delivery and payment status
    public function delivered($id){
        $order = order::find($id);
        $order->delivery_status = "delivered";
        $order->payment_status = "Paid";
        $order ->save();

        return redirect()->back();
    }

    //to print pdf of the order
    public function printPdf($id){
        $order=Order::find($id);

        $path = public_path() . '/product/' . $order->image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.pdf', compact('order','image'));
        // return $pdf->download('order-details.pdf');
        return $pdf->download('order-details.pdf');
    }

    //in order to send the email
    //not complete
    public function sendEmail($id){
        $order=Order::find($id);
        $user = $order->user_id;
        return view('admin.email');
    }

    //search in Admin
    public function search(Request $request){
        $search=$request->search;

        $order = Order::where('name', 'LIKE', "%$search%")->orWhere('phone', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->orWhere('product_title', 'LIKE', "%$search%")->orWhere('payment_status', 'LIKE', "%$search%")->orWhere('delivery_status', 'LIKE', "%$search%")->get();
        return view('admin.order', compact('order'));
    }
}