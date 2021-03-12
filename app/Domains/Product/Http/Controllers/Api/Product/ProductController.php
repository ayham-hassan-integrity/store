<?php

namespace App\Domains\Product\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Domains\Product\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/product",
     * summary="Get All Products",
     * description="Show All Products",
     * operationId="getAllProducts",
     * tags={"Product"},
     * @OA\Response(
     *    response=200,
     *    description="Returns when Product are found",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function index()
    {
        return Product::all();
    }



    /**
     * @OA\Get(
     * path="/api/product/{id}",
     * summary="Get Product by id",
     * description="Show one Product by id",
     * operationId="getOneProducts",
     * tags={"product"},
     * @OA\Parameter(
     *    description="ID of product",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when product id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Product is found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * @OA\Post (
     * path="/api/product",
     * summary="Create New Product",
     * description="Create One Product",
     * operationId="postOneProducts",
     * tags={"product"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Product fields",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when name or description deos'nt o the RequestBody ",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="name and description field are required"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Product has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * @OA\Put  (
     * path="/api/product/{id}",
     * summary="Edit one Product by id",
     * description="update One Product by id",
     * operationId="postOneProducts",
     * tags={"product"},
     * @OA\Parameter(
     *    description="ID of product",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Product fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Product has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:04:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * @OA\Delete (
     * path="/api/product/{id}",
     * summary="delete Product by id",
     * description="delete one Product by id",
     * operationId="deleteOneProducts",
     * tags={"product"},
     * @OA\Parameter(
     *    description="ID of product",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when product id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Products are found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="2021-03-10T15:47:13.000000Z"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function delete(Product $product)
    {
        $product->delete();

        return response()->json($product, 200);
    }
}