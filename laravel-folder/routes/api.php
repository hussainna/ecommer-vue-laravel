<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CheckOutController;


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::get('product_category/{id}',[ProductController::class,'ProductWithCategory']);
Route::get('search-product/{id}',[ProductController::class,'search']);
Route::get('get-category',[CategoryController::class,'index']);
Route::get('get-product',[ProductController::class,'index']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('single-product/{id}',[ProductController::class,'single']);

    Route::post('insert-cart',[CartController::class,'insert']);
    Route::get('get-cart',[CartController::class,'index']);
    Route::post('delete-cart/{id}',[CartController::class,'delete']);

    Route::post('insert-checout',[CheckOutController::class,'insert']);


});

Route::group(['middleware' => ['auth:sanctum','IsAdmin']],function(){
    Route::get('check-admin',function(){
        return response()->json([
            'status'=>200,
            'message'=>'welcome to dashboard sir',
        ]);
    });

    Route::post('insert-category',[CategoryController::class,'insert']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::post('update-category/{id}',[CategoryController::class,'update']);
    Route::post('delete-category/{id}',[CategoryController::class,'delete']);

    Route::post('insert-product',[ProductController::class,'insert']);
    Route::post('delete-product/{id}',[ProductController::class,'delete']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::post('update-product/{id}',[ProductController::class,'update']);


});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
