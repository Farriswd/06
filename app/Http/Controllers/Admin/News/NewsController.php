<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
        $news = News::paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create() {
        $categories = NewsCategory::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        $data['event_image'] =  $data['event_image'] ? Storage::disk('public')->put('images/news', $data['event_image']) : null;
        $data['preview_image'] = Storage::disk('public')->put('images/news', $data['preview_image']);
        $data['image'] = Storage::disk('public')->put('images/news', $data['image']);

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Post was successfully added');
    }

    public function edit(News $new) {
        $categories = NewsCategory::all();
        return view('admin.news.edit', compact('new', 'categories'));
    }

    public function update(UpdateRequest $request, News $new) {
        $data = $request->validated();

        if (isset($data['event_image'])) {
            if (!empty($new->event_image)) Storage::disk('public')->delete($new->event_image);
            $data['event_image'] = Storage::disk('public')->put('images/news', $data['event_image']);
        } else {
            unset($data['event_image']);
        }

        if (isset($data['preview_image'])) {
            Storage::disk('public')->delete($new->preview_image);
            $data['preview_image'] = Storage::disk('public')->put('images/news', $data['preview_image']);
        } else {
            unset($data['preview_image']);
        }

        if (isset($data['image'])) {
            Storage::disk('public')->delete($new->image);
            $data['image'] = Storage::disk('public')->put('images/news', $data['image']);
        } else {
            unset($data['image']);
        }

        $new->update($data);
        return response()->json(['success' => true, 'data' => $new]);
    }

    public function delete(News $new) {
        $res = $new->delete();
        if (!$res) return response()->json(['error' => true, 'data' => $res]);
        return response()->json(['success' => true, 'message' => 'Post was deleted successfully!']);
    }
}
