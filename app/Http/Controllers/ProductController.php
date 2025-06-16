<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with(['category', 'reviews']);

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    return response()->json($query->paginate(10));
}

public function store(StoreProductRequest $request)
{
    $product = Product::create($request->validated());
    return response()->json($product, 201);
}

public function show(Product $product)
{
    $product->load(['category', 'reviews']);
    return response()->json($product);
}

public function update(UpdateProductRequest $request, Product $product)
{
    $product->update($request->validated());
    return response()->json($product);
}

public function destroy(Product $product)
{
    $product->delete();
    return response()->json(['message' => 'Deleted']);
}
}
