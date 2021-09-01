<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Car\BrandController;

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
/* 
Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();
Route::get("/", [DashboardController::class, 'index'])->name("dashboard");
$router->group(['prefix' => 'user'], function () use ($router) {
    Route::get("/admin", [AdminController::class, 'index'])->name("admin");
    Route::get("/editor", [AdminController::class, 'editorList'])->name("editor");
    Route::get("/fetchbyPage", [AdminController::class, 'fetchbyPage']);
    Route::get("/editorFetchbyPage", [AdminController::class, 'editorFetchbyPage']);
    Route::get("/show/{id}", [AdminController::class, 'show']);
    Route::POST("/add", [AdminController::class, 'add'])->name("user.add");
    Route::POST("/update", [AdminController::class, 'update'])->name("user.update");
    Route::get("/delete/{id}", [AdminController::class, 'delete']);

});

$router->group(['prefix' => 'car'], function () use ($router) {
    Route::get("/brand", [BrandController::class, 'index'])->name("brand");
    Route::get("/fetchbyPage", [BrandController::class, 'fetchbyPage']);
    Route::POST("/add", [BrandController::class, 'add'])->name("brand.add");
    Route::get("/show/{id}", [BrandController::class, 'show']);
    Route::POST("/update", [BrandController::class, 'update'])->name("brand.update");
    Route::get("/delete/{id}", [BrandController::class, 'delete']);
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
