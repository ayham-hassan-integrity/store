<?php

namespace App\Domains\Product\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Domains\Product\Models\Product;
use App\Domains\Product\Services\ProductService;
use App\Domains\Product\Http\Requests\Backend\Product\DeleteProductRequest;
use App\Domains\Product\Http\Requests\Backend\Product\EditProductRequest;
use App\Domains\Product\Http\Requests\Backend\Product\StoreProductRequest;
use App\Domains\Product\Http\Requests\Backend\Product\UpdateProductRequest;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * ProductController constructor.
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.product.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * @param StoreProductRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->store($request->validated());

        return redirect()->route('admin.product.show', $product)->withFlashSuccess(__('The  Products was successfully created.'));
    }

    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function show(Product $product)
    {
        return view('backend.product.show')
            ->withProduct($product);
    }

    /**
     * @param EditProductRequest $request
     * @param Product $product
     *
     * @return mixed
     */
    public function edit(EditProductRequest $request, Product $product)
    {
        return view('backend.product.edit')
            ->withProduct($product);
    }

    /**
     * @param UpdateProductRequest $request
     * @param Product $product
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->update($product, $request->validated());

        return redirect()->route('admin.product.show', $product)->withFlashSuccess(__('The  Products was successfully updated.'));
    }

    /**
     * @param DeleteProductRequest $request
     * @param Product $product
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteProductRequest $request, Product $product)
    {
        $this->productService->delete($product);

        return redirect()->route('admin.$product.deleted')->withFlashSuccess(__('The  Products was successfully deleted.'));
    }
}