<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;




// Route for sending a message (e.g., from contact form on frontend)
Route::post('/send-message', [ContactController::class, 'sendMessage'])->name('contact.send');
Route::get('/', [HomeController::class,'home']);
Route::get('/shop', [HomeController::class,'shop']);
Route::get('/testmonial', [HomeController::class,'testmonial']);
Route::get('/why', [HomeController::class,'why']);
Route::get('/contact', [HomeController::class,'contact']);
Route::get('product_details/{id}', [HomeController::class,'product_details']);





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/dashboard', [HomeController::class,'login_home'])->name('dashboard');

Route::get('myorders', [HomeController::class,'myorders']);

route::get('add_cart/{id}', [HomeController::class,'add_cart']);

route::get('mycart', [HomeController::class,'mycart']);

route::get('delete_cart/{id}', [HomeController::class,'delete_cart']);

route::get('delete_myorder/{id}', [HomeController::class,'delete_myorders']);

route::post('confirm_order', [HomeController::class,'confirm_order']);

Route::get('stripe',[HomeController::class, 'stripe']);
Route::post('stripe',[HomeController::class, 'stripePost'])->name('stripe.post');
 });


Route::middleware(['auth', 'admin'])->group(function () {

// Admin view to list all messages
Route::get('/admin/messages', [ContactController::class, 'viewMessages'])->name('admin.messages');

// Admin route to delete a message
Route::get('/admin/delete-message/{id}', [ContactController::class, 'deleteMessage'])->name('admin.deleteMessage');

   Route::get('admin/dashboard', [HomeController::class,'index']);

Route::get('view_category', [AdminController::class,'view_category']);

Route::post('add_category', [AdminController::class,'add_category']);

Route::get('delete_category/{id}', [AdminController::class,'delete_category']);

Route::get('edit_category/{id}', [AdminController::class,'edit_category']);
Route::post('update_category/{id}', [AdminController::class,'update_category']);

Route::get('add_product', [AdminController::class,'add_product']);

Route::post('upload_product', [AdminController::class,'upload_product']);

Route::get('view_product', [AdminController::class,'view_product']);

Route::get('delete_product/{id}', [AdminController::class,'delete_product']);

Route::get('update_product/{id}', [AdminController::class,'update_product']);

Route::post('edit_product/{id}', [AdminController::class,'edit_product']);

Route::get('product_search', [AdminController::class,'product_search']);

Route::get('view_order', [AdminController::class,'view_order']);

Route::get('order_search', [AdminController::class,'order_search']);

Route::get('on_the_way/{id}', [AdminController::class,'on_the_way']);

Route::get('delivered/{id}', [AdminController::class,'delivered']);

Route::get('print_pdf/{id}', [AdminController::class,'print_pdf']);
});

require __DIR__.'/auth.php';










