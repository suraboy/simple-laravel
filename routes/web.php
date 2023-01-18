<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\DashboardController;

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

Route::group([
//    'middleware' => ['auth']
], function ($route) {

    $route->controller(DashboardController::class)->group(function ($route) {
        $route->get('/', 'index')->name('homepage');;
    });


    $route->controller(ProductController::class)->group(function ($route) {
        $route->get('/products', 'index')->name("products.index");
        $route->get('/products/create', 'create')->name("products.create");
        $route->post('/products/insert', 'insert')->name('products.insert');
//        $route->get('/info','ProductController@info')->name('products.info');
//        $route->post('/update','ProductController@update')->name('products.update');
//        $route->post('/destroy','ProductController@destroy')->name('products.destroy');
    });
});
