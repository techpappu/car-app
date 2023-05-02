<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\FAQController;
use App\Http\Controllers\Frontend\PriceCalculatorController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\CustomerFeedbackController;
use App\Http\Controllers\Frontend\DeliveryAddressController;
use App\Http\Controllers\Frontend\DownloadController;
use App\Http\Controllers\Frontend\FacebookController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\StripePaymentController;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('welcome');
});  */
// Route::prefix('admin/')->group(function () {
//     Auth::routes();
// });
// Route::get('/admin/login',[\App\Http\Controllers\Auth\LoginController::class,'loginView']);

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('event:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    return "Cleared!";
});
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');
Route::get('/car-details/{id}', [CarController::class, 'carDetails'])->name('car_details');
Route::get('/car-list', [CarController::class, 'carList'])->name('car-list');
Route::get('/car/list/fetchbyPage', [CarController::class, 'fetchbyPage']);
Route::get('/car-show/{id}', [CarController::class, 'show']);
$router->group(['prefix' => 'car'], function () use ($router) {
    Route::get("/model/{brandId}", [App\Http\Controllers\Frontend\HomeController::class, 'getModelsByBrand']);
    Route::get("/brand/{id}", [App\Http\Controllers\Frontend\HomeController::class, 'getAllBrand']);
});


Route::get('/car/list-search', [CarController::class, 'carListSearch'])->name('car-list-search');

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::get('checkout', [StripePaymentController::class, 'stripe'])->middleware('customerAuth');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe-post');

Route::post('postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/login', [LoginController::class, 'loginView'])->name('frontend.login');
Route::get('logout', [LoginController::class, 'logout'])->name('frontend.logout');
Route::get('/register', [LoginController::class, 'registerView'])->name('frontend.register');
Route::post('register', [LoginController::class, 'register'])->name('user.register');
Route::get('user/profile', [LoginController::class, 'userProfile'])->name('user-profile')->middleware('customerAuth');
Route::post('user/update', [LoginController::class, 'profileUpdate'])->name('profile-update')->middleware('customerAuth');
Route::get('user/contacts', [LoginController::class, 'getUserContacts'])->middleware('customerAuth');

Route::get('/checkOut', [StripePaymentController::class, 'checkOut']);
Route::get('/fetchAddressList', [StripePaymentController::class, 'fetchAddressList']);
Route::post('order-confirm', [StripePaymentController::class, 'orderConfirm'])->name('order-confirm');
Route::get('/user/order-list', [StripePaymentController::class, 'userOrderList'])->name('order-list')->middleware('customerAuth');
Route::get('/order-confirmed', [StripePaymentController::class, 'orderConfirmed'])->middleware('customerAuth');
Route::get('/orderconfirmed', [StripePaymentController::class, 'orderConfirmed_2'])->middleware('customerAuth');
Route::get("order/cancel-order/{id}", [StripePaymentController::class, 'cancelOrder']);
Route::get('/user/payment-list', [StripePaymentController::class, 'userPaymentList'])->name('payment-list')->middleware('customerAuth');

Route::post('add-address', [DeliveryAddressController::class,'add'])->name('add-address');
Route::post('update-address', [DeliveryAddressController::class,'update'])->name('update-address');
Route::get('show-address', [DeliveryAddressController::class,'show'])->name('show-address');
Route::delete('delete-address', [DeliveryAddressController::class,'delete'])->name('delete-address');
Route::get('list-address', [DeliveryAddressController::class,'list'])->name('list-address');

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('frontend.contact-us');
Route::post('add-contact-us', [ContactUsController::class,'add'])->name('add-contact-us');
Route::get('/inquiry_{carId}', [ContactUsController::class, 'inquiry'])->name('inquiry');
Route::post('add-inquiry', [ContactUsController::class,'addInquiry'])->name('add-inquiry');
Route::get('/terms-conditions', [ContactUsController::class, 'termsAndConditions'])->name('terms-conditions');

Route::get('/port-list/{country}', [PriceCalculatorController::class, 'portList']);
Route::get('/price-calculate/{country}/{port}', [PriceCalculatorController::class, 'priceCalculate']);


Route::get('/review', [CustomerFeedbackController::class, 'index'])->name('review');
Route::get('/car-review', [CustomerFeedbackController::class, 'carReview'])->name('car-review')->middleware('customerAuth');
Route::post('review-post', [CustomerFeedbackController::class, 'reviewPost'])->name('review-post')->middleware('customerAuth');

Route::get('/faq', [FAQController::class, 'index'])->name('frontend.faq');
Route::get('/how-to-buy', [FAQController::class, 'howToBuy'])->name('how-to-buy');

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/download/{id}', [DownloadController::class, 'download'])->name('download');
Route::get('/download-certficate/{id}', [DownloadController::class, 'downloadCertificate'])->name('download-certficate');

