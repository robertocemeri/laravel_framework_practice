<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceExampleController;
use App\Http\Controllers\GreetingController;
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
    return view('welcome');
});
// route parameter is required or else 404 NOT FOUND
Route::get('/ckemi-required/{name}',[Controller::class,'ckemi_required'] );

// route parameter with Regular Expression Constraints
Route::get('/ckemi-required-capitals/{name}',[Controller::class,'ckemi_required'] )->where('name', '[A-Z]+');

// route parameter is optional here
Route::get('/ckemi/{name?}',[Controller::class,'ckemi'] )->name('greeting');

// route for one action controller
Route::get('/greeting',GreetingController::class);

// resource example controller/routes
Route::resource('resource',ResourceExampleController::class);

// You may even register many resource controllers at once by passing an array to the resources method:
Route::resources([
    'resource' => ResourceExampleController::class,
    // 'posts' => PostController::class,
]);