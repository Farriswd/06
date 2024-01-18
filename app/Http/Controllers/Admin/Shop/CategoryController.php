<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Category\StoreRequest;
use App\Http\Requests\Admin\News\Category\UpdateRequest;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    public function index() {
        $categories = ProductCategory::all();
        return view('admin.shop.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.shop.categories.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        ProductCategory ::create($data);
        return redirect()->route('admin.shop.categories.index')->with('success', 'Category was successfully added');
    }

    public function edit(ProductCategory $category) {
        return view('admin.shop.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, ProductCategory $category) {
        $data = $request->validated();
        $category->update($data);
        return response()->json(['success' => true, 'data' => $category]);
    }

    public function delete(ProductCategory $category) {
        $res = $category->delete();
        if (!$res) return response()->json(['error' => true, 'data' => $res]);
        return response()->json(['success' => true, 'message' => 'Category was deleted successfully!']);
    }
}
