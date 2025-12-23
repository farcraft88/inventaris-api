<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * GET /api/products
     * User & Admin
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * POST /api/products
     * Admin only
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($data);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $product,
        ], 201);
    }

    /**
     * PATCH /api/products/{product}
     * Admin only
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'  => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
        ]);

        $product->update($data);

        return response()->json([
            'message' => 'Produk berhasil diupdate',
            'data' => $product->fresh(), // ambil data terbaru dari DB
        ]);
    }

    /**
     * DELETE /api/products/{product}
     * Admin only
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus',
        ]);
    }
}
