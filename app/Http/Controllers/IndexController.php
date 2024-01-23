<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $news = NewsResource::collection(News::latest()->limit(3)->get())->resolve();
        return inertia('Welcome', compact('news'));
    }
}
