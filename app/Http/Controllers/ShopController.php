<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\FilterRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;

class ShopController extends Controller
{
    public function index(Request $request) {

        $filterProducts = Product::query()->when($request->input('category'), function ($query, $category) {
           if ($category) {
               $query->where('category_id', $category);
           } else {
               $query->all();
           }
        })->paginate(10)->withQueryString();
        $products = ProductResource::collection($filterProducts);
        $categories = ProductCategory::all();
        return Inertia::render('Shop/Index', compact('products', 'categories'));
    }

}
