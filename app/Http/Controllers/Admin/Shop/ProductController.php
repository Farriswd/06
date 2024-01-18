<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\StoreRequest;
use App\Http\Requests\Admin\Shop\Product\UpdateRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(10);
        return view('admin.shop.products.index', compact('products'));
    }

    public function create() {
        $categories = ProductCategory::all();
        return view('admin.shop.products.create', compact('categories'));
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        $data['image'] = Storage::disk('public')->put('images/shop', $data['image']);

        Product::create($data);
        return redirect()->route('admin.shop.products.index')->with('success', 'Product was successfully added');
    }

    public function edit(Product $product) {
        $categories = ProductCategory::all();
        return view('admin.shop.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateRequest $request, Product $product) {
        $data = $request->validated();

        if (isset($data['image'])) {
            Storage::disk('public')->delete($product->image);
            $data['image'] = Storage::disk('public')->put('images/news', $data['image']);
        } else {
            unset($data['image']);
        }

        $product->update($data);
        return response()->json(['success' => true, 'data' => $product]);
    }

    public function delete(Product $product) {
        $res = $product->delete();
        if (!$res) return response()->json(['error' => true, 'data' => $res]);
        return response()->json(['success' => true, 'message' => 'Product was deleted successfully!']);
    }
}
