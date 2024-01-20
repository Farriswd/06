<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $news = NewsResource::collection(News::all())->resolve();
        return inertia('Welcome', compact('news'));
    }
}
