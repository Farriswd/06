<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $posts = NewsResource::collection(News::paginate(5));
        return inertia('Blog/Index', compact('posts'));
    }
}
