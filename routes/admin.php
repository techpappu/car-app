<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Car\BodyStyleController;
use App\Http\Controllers\Car\BrandController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Car\ColorController;
use App\Http\Controllers\Car\FAQController;
use App\Http\Controllers\Car\GalleryImageController;
use App\Http\Controllers\Car\ModelController;
use App\Http\Controllers\Car\PriceCalculatorController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Car\StripePaymentController;
use App\Http\Controllers\CustomerFeedbackController;
use App\Http\Controllers\PaymentController;

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
Auth::routes(['register' => false]);

Route::group(['prefix' => 'user','middleware' => ['admin','can:isAdmin']], function() {
    Route::get("/admin", [AdminController::class, 'index'])->name("admin");
    Route::get("/editor", [AdminController::class, 'editorList'])->name("editor");
    Route::get("/customer", [AdminController::class, 'customerList'])->name("customer");
    Route::get("/fetchbyPage", [AdminController::class, 'fetchbyPage']);
    Route::get("/editorFetchbyPage", [AdminController::class, 'editorFetchbyPage']);
    Route::get("/customerFetchbyPage", [AdminController::class, 'customerFetchbyPage']);
    Route::get("/show/{id}", [AdminController::class, 'show']);
    Route::POST("/add", [AdminController::class, 'add'])->name("user.add");
    Route::POST("/update", [AdminController::class, 'update'])->name("user.update");
    Route::get("/delete/{id}", [AdminController::class, 'delete']);
});
// $router->group(['prefix' => 'user'], function () use ($router) {
   
// });

Route::group(['prefix' => 'car','middleware' => ['admin','can:isEditor']], function() {
    Route::get("/brand", [BrandController::class, 'index'])->name("brand");
    Route::get("/brand/fetchbyPage", [BrandController::class, 'fetchbyPage']);
    Route::POST("/brand/add", [BrandController::class, 'add'])->name('brand.add');
    Route::get("/brand/show/{id}", [BrandController::class, 'show']);
    Route::POST("/brand/update", [BrandController::class, 'update'])->name("brand.update");
    Route::get("/brand/delete/{id}", [BrandController::class, 'delete']);

    Route::get("/model", [ModelController::class, 'index'])->name("model");
    Route::get("/model/fetchbyPage", [ModelController::class, 'fetchbyPage']);
    Route::POST("/model/add", [ModelController::class, 'add'])->name("model.add");
    Route::get("/model/show/{id}", [ModelController::class, 'show']);
    Route::POST("/model/update", [ModelController::class, 'update'])->name("model.update");
    Route::get("model/delete/{id}", [ModelController::class, 'delete']);
    Route::get("/model/{brandId}", [ModelController::class, 'getModelsByBrand']);

    Route::get("/bodyStyle", [BodyStyleController::class, 'index'])->name("bodyStyle");
    Route::get("/bodyStyle/fetchbyPage", [BodyStyleController::class, 'fetchbyPage']);
    Route::POST("/bodyStyle/add", [BodyStyleController::class, 'add'])->name("bodyStyle.add");
    Route::get("/bodyStyle/show/{id}", [BodyStyleController::class, 'show']);
    Route::POST("/bodyStyle/update", [BodyStyleController::class, 'update'])->name("bodyStyle.update");
    Route::get("/bodyStyle/delete/{id}", [BodyStyleController::class, 'delete']);

    Route::get("/color", [ColorController::class, 'index'])->name("color");
    Route::get("/color/fetchbyPage", [ColorController::class, 'fetchbyPage']);
    Route::POST("/color/add", [ColorController::class, 'add'])->name("color.add");
    Route::get("/color/show/{id}", [ColorController::class, 'show']);
    Route::POST("/color/update", [ColorController::class, 'update'])->name("color.update");
    Route::get("/color/delete/{id}", [ColorController::class, 'delete']);

    Route::get("/", [CarController::class, 'index'])->name("car");
    Route::get("/fetchbyPage", [CarController::class, 'fetchbyPage']);
    Route::POST("/add", [CarController::class, 'add'])->name("add");
    Route::get("/show/{id}", [CarController::class, 'show']);
    Route::POST("/update", [CarController::class, 'update'])->name("update");
    Route::get("delete/{id}", [CarController::class, 'delete']);
    Route::get("carImageById/{id}", [CarController::class, 'carImageById']);
    Route::get("deleteCarImage/{id}", [CarController::class, 'deleteCarImage']);
    Route::POST("/updatePosition", [CarController::class, 'updatePosition'])->name("updatePosition");
    Route::POST("/updateStatus", [CarController::class, 'updateStatus'])->name("updateStatus");

    Route::get("/faq", [FAQController::class, 'index'])->name("faq");
    Route::get("/faq/fetchbyPage", [FAQController::class, 'fetchbyPage']);
    Route::POST("/faq/add", [FAQController::class, 'add'])->name("faq.add");
    Route::get("/faq/show/{id}", [FAQController::class, 'show']);
    Route::POST("/faq/update", [FAQController::class, 'update'])->name("faq.update");
    Route::get("faq/delete/{id}", [FAQController::class, 'delete']);

    Route::get("/gallery", [GalleryImageController::class, 'index'])->name("gallery");
    Route::get("/gallery/fetchbyPage", [GalleryImageController::class, 'fetchbyPage']);
    Route::POST("/gallery/add", [GalleryImageController::class, 'add'])->name("gallery.add");
    Route::get("/gallery/show/{id}", [GalleryImageController::class, 'show']);
    Route::POST("/gallery/update", [GalleryImageController::class, 'update'])->name("gallery.update");
    Route::get("/gallery/delete/{id}", [GalleryImageController::class, 'delete']);

    Route::get("/price-calculator", [PriceCalculatorController::class, 'index'])->name("price-calculator");
    Route::get("/price-calculator/fetchbyPage", [PriceCalculatorController::class, 'fetchbyPage']);
    Route::POST("/price-calculator/add", [PriceCalculatorController::class, 'add'])->name("price-calculator.add");
    Route::get("/price-calculator/show/{id}", [PriceCalculatorController::class, 'show']);
    Route::POST("/price-calculator/update", [PriceCalculatorController::class, 'update'])->name("price-calculator.update");
    Route::get("price-calculator/delete/{id}", [PriceCalculatorController::class, 'delete']);
});

Route::get("/", [DashboardController::class, 'index'])->middleware(['admin','can:isEditor'])->name("dashboard");

Route::middleware(['admin','can:isAdmin'])->group(function () {
    Route::get("/contact-us", [ContactUsController::class, 'index'])->name("contact-us");
    Route::get("/contact-us/fetchbyPage", [ContactUsController::class, 'fetchbyPage']);
    Route::get("contact-us/delete/{id}", [ContactUsController::class, 'delete']);
    Route::post('/contact-us/mail-reply', [ContactUsController::class, 'replayMail'])->name('mail-reply');
    Route::get("/inquiry", [ContactUsController::class, 'inquiry'])->name("admin.inquiry");
    Route::get("/inquiry/inquiryFetchbyPage", [ContactUsController::class, 'inquiryFetchbyPage']);


    Route::get("/order-list", [StripePaymentController::class, 'orderList'])->name("admin.order-list");
    Route::post("/order-status", [StripePaymentController::class, 'orderStatusUpdate'])->name("order-status");
    Route::get("/order-list/fetchbyPage", [StripePaymentController::class, 'fetchbyPage']);
    Route::get("/order/show/{id}", [StripePaymentController::class, 'getOrderById']);
    Route::get("/order-admin-info/show/{id}", [StripePaymentController::class, 'orderAdminInfo']);
    Route::post("/order-update", [StripePaymentController::class, 'orderUpdate'])->name("order-update");
    Route::post("/order-attached-certificate", [StripePaymentController::class, 'orderAttachedCertificate'])->name("order-attached-certificate");


    Route::get('/car-review', [CustomerFeedbackController::class, 'carReview'])->name('admin.car-review');
    Route::post('review-post', [CustomerFeedbackController::class, 'reviewPost'])->name('admin.review-post');
    Route::get("/payment-list", [PaymentController::class, 'index'])->name("admin.payment-list");
    Route::get("/payment/show/{id}", [PaymentController::class, 'getPaymentById']);
    Route::post("/payment/add-pay", [PaymentController::class, 'addPay'])->name("add-pay");
    Route::get("/payment-list/fetchbyPage", [PaymentController::class, 'fetchbyPage']);
    Route::get("/payment-list/fetch_data_search", [PaymentController::class, 'fetchBySearch']);
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

