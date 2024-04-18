<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\frontend\AddtocartController;
use App\Http\Controllers\mailController;
use App\Http\Middleware\userAuthCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registraion;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\adminAuthcheck;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\phonePeController;
use App\Http\Controllers\RazorpayController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', function(){
    return view('login');
});
Route::get('registration', function(){
    return view('registration');
});
Route::post('loginpost', [loginController::class, 'authenticate']);
Route::get('logout', [loginController::class, 'logout'])->middleware(CheckAuth::class);
Route::get('login', [loginController::class, 'login'])->name('login');
Route::post('registratiionpost', [registraion ::class ,'index']);

// Route::get('home', function(){
//     return view('home');
// });
Route::get('profile', function(){
    return view('profile');
})->middleware(CheckAuth::class);

//*********************************************** admin route *******************************************************

// Route::get('admin', function(){
//     return view('admin');
// })->middleware(adminAuthcheck::class);


Route::middleware(adminAuthcheck::class)->prefix('admin')->group(function () {
   Route::get('/addproduct', [adminController::class , 'index']); 
   Route::post('/addproduct', [adminController::class , 'addproduct']); 
   Route::get('/product/edit/{id}', [adminController::class , 'editproduct'])->name('adminproductedit'); 
   Route::post('/admin/product/update/{id}', [adminController::class , 'updateProduct'])->name("adminproductupdate"); 
   Route::get('/product/delete/{id}', [adminController::class , 'Harddelete'])->name("adminproductdelete"); 
   Route::get('/product/restore/{id}', [adminController::class , 'restore'])->name("adminproductrestore"); 
   Route::get('/home', [adminController::class , 'viewproduct'])->name('admin.home'); 
   Route::get('trash/{id}', [adminController::class , 'softdelete'])->name('trash'); 
   Route::get('gototrash', [adminController::class , 'trash']); 
});


// ************************** frontend route *************************************************************
Route::get("/" , [indexController::class, 'index']);
Route::get("/shop" , [indexController::class, 'shop'])->middleware(['auth' , 'verified']);
Route::get("/shop-detail" , [indexController::class, 'shop_detail']);
Route::get("/cart" , [indexController::class, 'cart']);
Route::get("/chackout" , [indexController::class, 'chackout'])->middleware(['auth' , 'verified']);;
Route::get("/testimonial" , [indexController::class, 'testimonial']);
Route::get("/pagnotfound" , [indexController::class, 'pagnotfound']);
Route::get("/contact" , [indexController::class, 'contact']);
Route::get('addtocart/{id}', [AddtocartController::class,'addproductincart'])->name("addtocart")->middleware(userAuthCheck::class);
Route::get('cart', [AddtocartController::class,'viewcart'])->middleware(userAuthCheck::class);
Route::get('remove/product/cart/{id}', [AddtocartController::class,'productremovecart'])->name("productremovecart")->middleware(userAuthCheck::class);
Route::get('allproductremovecart', [AddtocartController::class,'allproductremovecart'])->middleware(userAuthCheck::class);

// Route::get("/logins" , [indexController::class, 'login']);
// Route::get("/registration" , [indexController::class, 'registration']);
// ************************** frontend route End **********************************************************

// ****************** payment route ***********************************************************************
Route::get('payment', [RazorpayController::class, 'index'])->middleware(userAuthCheck::class);
Route::post('payment', [RazorpayController::class, 'store'])->middleware(userAuthCheck::class);
Route::get('mail' , [mailController::class , 'mainsend'])->middleware(userAuthCheck::class);
Route::get('getuser' , [mailController::class , 'index']);

