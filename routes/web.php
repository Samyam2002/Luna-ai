<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home page
Route::get('/', function () {
    // return view('welcome');
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//show dashboard according the user type
Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');

//???
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




/*rest of the routes*/

//pages routes
Route::get('/shop', [PageController::class, 'shop']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/product/{id}', [PageController::class, 'product']);

//to sort the products on the basis of price
Route::get('/sortMintoMax',[PageController::class, 'sortMintoMax']);
Route::get('/sortMaxtoMin',[PageController::class, 'sortMaxtoMin']);

//for filtering based on category
Route::get('/cat/{id}',[PageController::class, 'searchCategory']);

//searching
Route::get('/search',[PageController::class, 'search']);

//crud functions only for admin
Route::middleware('auth','is_admin')->group(function(){
    // Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');

    Route::get('/category', [AdminController::class, 'category']);
    Route::post('/add_category', [AdminController::class, 'addCategory']);
    Route::get('/update_category/{id}', [AdminController::class, 'updateCategory']);
    Route::patch('/edit_category/{id}', [AdminController::class, 'editCategory']);
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory']);

    Route::get('/create_product', [AdminController::class, 'createProduct']);
    Route::post('/add_product', [AdminController::class, 'addProduct']);
    Route::get('/manage_product', [AdminController::class, 'manageProduct']);
    Route::get('/update_product/{id}', [AdminController::class, 'updateProduct']);
    Route::post('/edit_product/{id}', [AdminController::class, 'editProduct']);
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct']);
});