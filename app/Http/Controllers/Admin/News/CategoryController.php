<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Category\StoreRequest;
use App\Http\Requests\Admin\News\Category\UpdateRequest;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = NewsCategory::all();
        return view('admin.news.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.news.categories.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        NewsCategory::create($data);
        return redirect()->route('admin.news.categories.index')->with('success', 'Category was successfully added');
    }

    public function edit(NewsCategory $category) {
        return view('admin.news.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, NewsCategory $category) {
        $data = $request->validated();
        $category->update($data);
        return response()->json(['success' => true, 'data' => $category]);
    }

    public function delete(NewsCategory $category) {
        $res = $category->delete();
        if (!$res) return response()->json(['error' => true, 'data' => $res]);
        return response()->json(['success' => true, 'message' => 'Category was deleted successfully!']);
    }
}
