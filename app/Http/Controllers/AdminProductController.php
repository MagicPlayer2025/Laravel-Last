<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderByDesc('created_at')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image_url' => ['nullable', 'url'],
        ]);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Товар добавлен.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        CartItem::where('product_id', $product->id)->delete();
        $product->delete();

        return back()->with('success', 'Товар удален.');
    }
}

