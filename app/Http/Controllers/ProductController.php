<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderByDesc('created_at')->paginate(9);

        return view('products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        $product->load(['reviews.user']);

        return view('products.show', [
            'product' => $product,
            'reviews' => $product->reviews()->latest()->get(),
            'avgRating' => $product->reviews()->avg('rating'),
        ]);
    }
}

