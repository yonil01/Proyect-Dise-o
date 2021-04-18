<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('', 'App\Http\Controllers\MainController@index')->name('welcome');


Route::get('*home', function(){
    redirect('/');
});

Route::get('/loginempresa', function(){
    return view('auth.login');
});



Route::post('cliente/check', 'App\Http\Controllers\ClientController@check')->name('client.check');
Route::get('salir', 'App\Http\Controllers\ClientController@logout')->name('client.logout');
Route::resource('cliente', 'App\Http\Controllers\ClientController');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/logincliente', function(){
        return view('auth.loginuser');
    });
    

    Route::get('menu', 'App\Http\Controllers\ClientController@dashboard')->name('client.dashboard');
    
    Route::get('/home', 'App\Http\Controllers\ClientController@home')->name('client.home');
    Route::get('/usuario/configuracion', 'App\Http\Controllers\ClientController@seting')->name('client.seting');
    Route::get('/usuario/perfil', 'App\Http\Controllers\ClientController@dashboard')->name('client.profile');
    Route::get('/usuario/staff', 'App\Http\Controllers\ClientController@staff')->name('client.staff');

    Route::get('/venta', 'App\Http\Controllers\VentaController@index')->name('venta.index');

});

//Cart
Route::get('/cart/create/{id}','App\Http\Controllers\CartController@create' )->name('cart.create');

//CartController
Route::get('cliente/cart_product/{id}', 'App\Http\Controllers\CartProductController@create')->name('cartproduct.create');
Route::get('cliente/cart_product/{id}/delete', 'App\Http\Controllers\CartProductController@delete')->name('cartproduct.delete');


Route::get('/producto/detalle/{id}', [MainController::class, 'show']);

Route::resource('empresa', 'App\Http\Controllers\CompanyController');

Route::resource('empresa/producto', 'App\Http\Controllers\ProductController');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//stripe
Route::get('checkout','CheckoutController@checkout');
Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');


//Venta
