<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('your-email@example.com')
                ->subject('Test Email from Laravel');
    });

    return 'Test email sent!';
});


Route::get('/', [HomeController::class,'home']);
Route::get('/shop', [HomeController::class,'shop']);
Route::get('/testmonial', [HomeController::class,'testmonial']);
Route::get('/why', [HomeController::class,'why']);
Route::get('/contact', [HomeController::class,'contact']);


Route::get('/dashboard', [HomeController::class,'login_home'])->
middleware(['auth', 'verified'])->name('dashboard');

Route::get('myorders', [HomeController::class,'myorders'])->
middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth','admin']);

route::get('view_category', [AdminController::class,'view_category'])->middleware(['auth','admin']);

Route::post('/send-message', [AdminController::class, 'sendMessage']);


route::post('add_category', [AdminController::class,'add_category'])->middleware(['auth','admin']);

route::get('delete_category/{id}', [AdminController::class,'delete_category'])->middleware(['auth','admin']);

route::get('edit_category/{id}', [AdminController::class,'edit_category'])->middleware(['auth','admin']);

route::post('update_category/{id}', [AdminController::class,'update_category'])->middleware(['auth','admin']);

route::get('add_product', [AdminController::class,'add_product'])->middleware(['auth','admin']);

route::post('upload_product', [AdminController::class,'upload_product'])->middleware(['auth','admin']);

route::get('view_product', [AdminController::class,'view_product'])->middleware(['auth','admin']);

route::get('delete_product/{id}', [AdminController::class,'delete_product'])->middleware(['auth','admin']);

route::get('update_product/{id}', [AdminController::class,'update_product'])->middleware(['auth','admin']);

route::post('edit_product/{id}', [AdminController::class,'edit_product'])->middleware(['auth','admin']);

route::get('product_search', [AdminController::class,'product_search'])->middleware(['auth','admin']);

route::get('product_details/{id}', [HomeController::class,'product_details']);

route::get('add_cart/{id}', [HomeController::class,'add_cart'])->middleware(['auth','verified']);

route::get('mycart', [HomeController::class,'mycart'])->middleware(['auth','verified']);

route::get('delete_cart/{id}', [HomeController::class,'delete_cart'])->middleware(['auth','verified']);

route::post('confirm_order', [HomeController::class,'confirm_order'])->middleware(['auth','verified']);

Route::controller(HomeController::class)->group(function(){
	Route::get('stripe','stripe');
	Route::post('stripe','stripePost')->name('stripe.post');
});

route::get('view_order', [AdminController::class,'view_order'])->middleware(['auth','admin']);

route::get('order_search', [AdminController::class,'order_search'])->middleware(['auth','admin']);

route::get('on_the_way/{id}', [AdminController::class,'on_the_way'])->middleware(['auth','admin']);

route::get('delivered/{id}', [AdminController::class,'delivered'])->middleware(['auth','admin']);

route::get('print_pdf/{id}', [AdminController::class,'print_pdf'])->middleware(['auth','admin']);