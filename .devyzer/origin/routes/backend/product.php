<?php

use App\Domains\Product\Http\Controllers\Backend\Product\DeletedProductController;
use App\Domains\Product\Http\Controllers\Backend\Product\ProductController;
use App\Domains\Product\Models\Product;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'product',
    'as' => 'product.',
], function () {

    Route::get('/', [ProductController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' Products'), route('admin.product.index'));
        });


    Route::get('deleted', [DeletedProductController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.product.index')
                ->push(__('Deleted  Products'), route('admin.product.deleted'));
        });


    Route::get('create', [ProductController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.product.index')
                ->push(__('Create Product'), route('admin.product.create'));
        });

    Route::post('/', [ProductController::class, 'store'])->name('store');

    Route::group(['prefix' => '{product}'], function () {
        Route::get('/', [ProductController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Product $product) {
                $trail->parent('admin.product.index')
                    ->push($product->id, route('admin.product.show', $product));
            });

        Route::get('edit', [ProductController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Product $product) {
                $trail->parent('admin.product.show', $product)
                    ->push(__('Edit'), route('admin.product.edit', $product));
            });

        Route::patch('/', [ProductController::class, 'update'])->name('update');
        Route::delete('/', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedProduct}'], function () {
        Route::patch('restore', [DeletedProductController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedProductController::class, 'destroy'])->name('permanently-delete');
    });
});