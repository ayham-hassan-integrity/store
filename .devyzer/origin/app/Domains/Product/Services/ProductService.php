<?php

namespace App\Domains\Product\Services;

use App\Domains\Product\Models\Product;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductService.
 */
class ProductService extends BaseService
{
    /**
     * ProductService constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * @param array $data
     *
     * @return Product
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Product
    {
        DB::beginTransaction();

        try {
            $product = $this->model::create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this product. Please try again.'));
        }

        DB::commit();

        return $product;
    }

    /**
     * @param Product $product
     * @param array $data
     *
     * @return Product
     * @throws \Throwable
     */
    public function update(Product $product, array $data = []): Product
    {
        DB::beginTransaction();

        try {
            $product->update([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this product. Please try again.'));
        }

        DB::commit();

        return $product;
    }

    /**
     * @param Product $product
     *
     * @return Product
     * @throws GeneralException
     */
    public function delete(Product $product): Product
    {
        if ($this->deleteById($product->id)) {
            return $product;
        }

        throw new GeneralException('There was a problem deleting this product. Please try again.');
    }

    /**
     * @param Product $product
     *
     * @return Product
     * @throws GeneralException
     */
    public function restore(Product $product): Product
    {
        if ($product->restore()) {
            return $product;
        }

        throw new GeneralException(__('There was a problem restoring this  Products. Please try again.'));
    }

    /**
     * @param Product $product
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Product $product): bool
    {
        if ($product->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  Products. Please try again.'));
    }
}