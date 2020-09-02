<?php

use App\Book;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $books = Book::latest()->paginate(12);
    //dd($books);
    return view('index', ['books' => $books]);
})->name('index');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'User\CustomerController@index')->middleware('auth')->name('customer.home');

//
Route::resource('/dashboard' , 'User\UsersController');

//book management routes
Route::resource('/book', 'BookManager')->middleware('can:isadmin');

//cart manament routes
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add');
Route::get('/cart/clear', 'CartController@clearall')->name('cart.clear');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');

Route::resource('orders', 'OrderController');

Route::get('/myorders/{userId}', 'UserOrderController@index')->middleware('auth')->name('user.orders');

Route::get('paypal/checkout/{orderId}', 'PayPalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{orderId}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PayPalController@cancelPage')->name('paypal.cancel');

//Contact manament routes
Route::resource('contact', 'ContactController');

//Subcription manament routes
Route::resource('subscribe', 'SubscribeController');

Route::get('/search', 'BooksController@searchBook')->name('book.search');
