<?php

namespace App\Domains\Product\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Domains\Product\Models\Product;
use App\Domains\Product\Services\ProductService;

/**
 * Class DeletedProductController.
 */
class DeletedProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * DeletedProductController constructor.
     *
     * @param  ProductService  $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.product.deleted');
    }

    /**
     * @param  Product  $deletedProduct
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Product $deletedProduct)
    {
        $this->productService->restore($deletedProduct);

        return redirect()->route('admin.product.index')->withFlashSuccess(__('The  Products was successfully restored.'));
    }

    /**
     * @param  Product  $deletedProduct
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Product $deletedProduct)
    {
        $this->productService->destroy($deletedProduct);

        return redirect()->route('admin.product.deleted')->withFlashSuccess(__('The  Products was permanently deleted.'));
    }
}