<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SizeDressController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\SizeDress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/search/{search}', [ProductController::class, 'getProductsBySearch']);
Route::get('/products/{product:slug}', [ProductController::class, 'show']);
Route::get('/products/category/{category:slug}', [ProductController::class, 'getProductsByCategory']);
Route::post('/products', [ProductController::class, 'store']);
Route::post('/products/{product:slug}', [ProductController::class, 'update']);
Route::delete('/products/{product:slug}', [ProductController::class, 'destroy']);


Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'store']);
Route::post('categories/{category}', [CategoryController::class, 'update']);
Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

Route::get('carts', [CartController::class, 'index']);
Route::get('carts/{cart}', [CartController::class, 'show']);
Route::get('carts/user/{user:name}', [CartController::class, 'getCartsByUser']);
Route::post('carts', [CartController::class, 'store']);

Route::post('carts/{cart}', [CartController::class, 'update']);
Route::delete('carts/{cart}', [CartController::class, 'destroy']);


Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/user/{user}', [OrderController::class, 'getOrderByUser']);
Route::get('/orders/search/{search}', [OrderController::class, 'getOrdersBySearch']);
Route::post('orders/{status}', [OrderController::class, 'update']);
Route::post('orders', [DetailOrderController::class, 'store']);





Route::get('users', [UserController::class, 'index']);
Route::post('users/{user}', [UserController::class, 'update']);
Route::get('roles', [RoleController::class, 'index']);


Route::get('size/dress', [SizeDressController::class, 'index']);
Route::post('size/dress', [SizeDressController::class, 'store']);
Route::post('size/dress/{size}', [SizeDressController::class, 'update']);
Route::delete('size/dress/{size}', [SizeDressController::class, 'destroy']);

Route::get('status', [StatusController::class, 'index']);
// Route::post('status/{status}', [StatusController::class, 'update']);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
