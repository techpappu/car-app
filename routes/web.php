<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Car\BodyStyleController;
use App\Http\Controllers\Car\BrandController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Car\ColorController;
use App\Http\Controllers\Car\ModelController;

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

    Route::get("/model", [ModelController::class, 'index'])->name("model");
    Route::get("/model/fetchbyPage", [ModelController::class, 'fetchbyPage']);
    Route::POST("/model/add", [ModelController::class, 'add'])->name("model.add");
    Route::get("/model/show/{id}", [ModelController::class, 'show']);
    Route::POST("/model/update", [ModelController::class, 'update'])->name("model.update");
    Route::get("model/delete/{id}", [ModelController::class, 'delete']);

    Route::get("/bodyStyle", [BodyStyleController::class, 'index'])->name("bodyStyle");
    Route::get("/bodyStyle/fetchbyPage", [BodyStyleController::class, 'fetchbyPage']);
    Route::POST("/bodyStyle/add", [BodyStyleController::class, 'add'])->name("bodyStyle.add");
    Route::get("/bodyStyle/show/{id}", [BodyStyleController::class, 'show']);
    Route::POST("/bodyStyle/update", [BodyStyleController::class, 'update'])->name("bodyStyle.update");
    Route::get("bodyStyle/delete/{id}", [BodyStyleController::class, 'delete']);

    Route::get("/color", [ColorController::class, 'index'])->name("color");
    Route::get("/color/fetchbyPage", [ColorController::class, 'fetchbyPage']);
    Route::POST("/color/add", [ColorController::class, 'add'])->name("color.add");
    Route::get("/color/show/{id}", [ColorController::class, 'show']);
    Route::POST("/color/update", [ColorController::class, 'update'])->name("color.update");
    Route::get("color/delete/{id}", [ColorController::class, 'delete']);
    
    Route::get("/", [CarController::class, 'index'])->name("car");
    Route::get("/fetchbyPage", [CarController::class, 'fetchbyPage']);
    Route::POST("/add", [CarController::class, 'add'])->name("add");
    Route::get("/show/{id}", [CarController::class, 'show']);
    Route::POST("/update", [CarController::class, 'update'])->name("update");
    Route::get("delete/{id}", [CarController::class, 'delete']);
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
