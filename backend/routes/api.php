<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

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


Route::group(['prefix' => '/user', 'middleware'=>['guest:api'], 'namespace' => 'Api' ], function(){

    Route::post('/login', [AuthController::class, 'login']); // Read all data guest in frontend
    Route::post('/register', [AuthController::class, 'register']); // Read all data guest in frontend

});



Route::group(['prefix' => '/user', 'middleware'=>['auth:api'], 'namespace' => 'Api'  ], function(){

    // User information
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'current_user']);
    Route::get('/all-user', [AuthController::class, 'all_user']);


    // Categories api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/cat'], function () {

        Route::get('/backend-cat-list', [CategoriesController::class, 'backendShowList']); // Read all Categories data by user
        Route::post('/store', [CategoriesController::class, 'store']); // add Categories data
        Route::get('/get/{id}', [CategoriesController::class, 'get']);  // Read current user Categories data

        Route::put('/update/{id}', [CategoriesController::class, 'update']);
        Route::post('/delete', [CategoriesController::class, 'delete']);

    });

    // Product ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/product'], function () {

        Route::get('/backend-product-list', [ProductController::class, 'backendShowList']); // Read all Categories data by user
        Route::post('/store', [ProductController::class, 'store']); // add Categories data
        Route::get('/get/{id}', [ProductController::class, 'get']);  // Read current user Categories data

        Route::put('/update/{id}', [ProductController::class, 'update']);
        Route::post('/delete', [ProductController::class, 'delete']);

    });


});

// Show this route for all user ( Login Or without Login )

Route::group(['prefix' => '/all' ], function() {

    Route::get('/client-categories', [CategoriesController::class, 'frontendShow']); // Read Categories data in frontend
    Route::get('/client-product', [ProductController::class, 'frontendShow']); // Read all product data in frontend
    Route::get('/client-cat-product/{id}', [ProductController::class, 'frontendShowCatP']); // Read Categories ways product data Show in frontend
    Route::get('/client-product-detail/{id}', [ProductController::class, 'get']);  // Read current user Categories data
});

