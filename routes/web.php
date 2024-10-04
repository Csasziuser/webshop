<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product_type;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products', function () {
//     $termekek = [["brand" =>"Adidas","model"=> "Predator","size"=> 43, "price"=> 20000],["brand" =>"Adidas","model"=> "Predator","size"=> 41, "price"=> 16000],["brand" =>"New Balance","model"=> "500","size"=> 37, "price"=> 37000]];
//     return view('list_product', ['termekek' => $termekek]);
// });

Route::get('/products/shoes', [ProductController::class,'index'])->name('products.index');
Route::get('/products/clothes', [ProductController::class,'clothes_index'])->name('clothes.index');
Route::put('products/update/{id}',[ProductController::class, 'update'])->name('update_stock');

Route::get('new-product', function () 
{ 
    $types = Product_type::all();
    return view('products.new_product',['types' => $types]);
});
Route::post('new-product', [ProductController::class,'store']);

Route::get('/admin_product', [ProductController::class,'adminIndex'])->name('admin_termekek');
Route::delete('/admin_product/delete/{id}', [ProductController::class,'destroy'])->name('delete_product');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
