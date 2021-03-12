<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

use App\Domains\Product\Http\Controllers\Api\Product\ProductController;

Route::group([
    'prefix' => 'product',
    'as' => 'product.',
], function () {

    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [ProductController::class, 'show'])->name('show');
        Route::put('/', [ProductController::class, 'update'])->name('update');
        Route::delete('/', [ProductController::class, 'delete'])->name('destroy');
    });
});
