<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;

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

Route::get("/", [HomeController::class, "index"])->name('home');


Route::get("/vendor/login", [HomeController::class, "vendor_login"])->name('vendor.login');




Route::resource('product-category', ProductCategoryController::class);
Route::resource('product', ProductController::class);
//Route::resource('vendor', VendorController::class);

//Route::get('/vendor/dashboard', [App\Http\Controllers\VendorController::class, 'dashboard'])->name('vendor.dashboard');


/**
 * Administrator Routes
 */
Route::group(['prefix' => 'admin'], function () {

    /**
     * Authentication Routes
     */
    Route::group(['prefix' => 'auth'], function () {
        // Buyer Resource Route
        Route::resource('buyer', BaseController::class);

        // Seller Resource Route
        Route::resource('seller', BaseController::class);

        // Roles and Permissions
        Route::resource('roles', BaseController::class);
        Route::resource('permissions', BaseController::class);

        //Buyer Management
        Route::resource('buyer', BaseController::class);
    });

    Route::get('/', function () {
        return 'Admin';
    });

    Route::get("/products", function (){
        return view('admin.product.index');
    })->name('admin.products.index');

});

/**
 * User
 */

Route::group(['prefix' => 'user'], function (){
    Route::get('/drone', function (){
        return view('pages.drone');
    })->name('drone');

    Route::get('/order_history', function (){
        return view('pages.order_history');
    })->name('order_history');

    Route::get('/order', [ProductController::class, 'order'])->name('order');

// Seller Route
    Route::get('/pizzahut/{id}', [ProductController::class, 'product'])->name('pizzahut');

//    Route::get("/pizza", [ProductController::class, "product"])->name('product');

//Shop Route
    Route::get('/shops', [\App\Http\Controllers\UserController::class, 'shop'])->name('shops');

//Cart
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::delete('remove_from_cart', [ProductController::class, 'remove'])->name('remove_from_cart');
    Route::patch('update_cart', [ProductController::class, 'update_cart'])->name('update_cart');

//Checkout
    Route::post('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
    Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
    Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
    Route::get('/cancel', 'App\Http\Controllers\StripeController@cancel')->name('cancel');
    Route::get('/payment', function () {
        return view('pages.checkout');
    })->name('payment');

});

Route::group(['prefix' => 'vendor'], function (){

    Route::get('/login', [App\Http\Controllers\VendorLoginController::class, 'showVendorLoginForm'])->name('vendor.login.form');
    Route::post('/login', [App\Http\Controllers\VendorLoginController::class, 'vendor_login'])->name('vendor.login');

});

Route::get("/products", function (){
    return view('admin.product.product');
})->name('products');

Route::post('/products', [ProductController::class, 'store'])->name('product.store');

Route::get("/about", function () {
    return view('pages.about');
})->name('about');


Route::get("/news", function () {
    return view('pages.news');
});

Route::get("/contact", function () {
    return view('pages.contact');
})->name('contact');

Route::get("/home", function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Users Routes
    Route::resource(
        'product-category',
        \App\Http\Controllers\ProductCategoryController::class
    );

    Route::resource(
        'user',
        \App\Http\Controllers\UserController::class
    );
});

Route::middleware([
//    'role'
])->get('dev', function (Request $request){

    //prduct
    $product = App\Models\Product::first();

    //create cart
    $cart = App\Models\Cart::create([
        'user_id' => 1,
        'item_count' => 1,
        'sub_total' => 10.99,
        'total_discount' => 0,
        'total' => 10.99,
        'total_tax' => 0,
        'is_paid' => false,

    ]);

    //add product to cart
    $cart->products()->attach($product->id,
        [
            'quantity' => 1,
            'discount' => 0,
            'tax' => 0,
            'price' => $product->price,
        ]);


    dd($product, $cart);
    //$users =  DB::table('users')->get();

    return "HUwaino";
});
