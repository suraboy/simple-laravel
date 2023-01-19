<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\UserController;

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

Auth::routes();

Route::group([
    'middleware' => ['auth']
], function ($route) {

    $route->controller(DashboardController::class)->group(function ($route) {
        $route->get('/', 'index')->name('homepage');;
    });


    $route->controller(ProductController::class)->group(function ($route) {
        $route->group(['prefix' => 'products'], function ($route) {
            $route->get('/', 'index')->name("products.index");
            $route->get('/create', 'create')->name("products.create");
            $route->post('/insert', 'insert')->name('products.insert');
            $route->get('info', 'info')->name('products.info');
            $route->post('update', 'update')->name('products.update');
            $route->post('/destroy', 'destroy')->name('products.destroy');
        });
    });

    $route->controller(UserController::class)->group(function ($route) {
        $route->group(['prefix' => 'users'], function ($route) {
            $route->get('info', 'profile')->name('users.info');
        });
    });


});
