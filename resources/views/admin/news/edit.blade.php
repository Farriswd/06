@extends('admin.layouts.main')

@section('content')
    <h2>Update Post</h2>
    <form id="update_post">
        <div class="form-group">
            <label for="title" class="form-control-label">Title <span class="text-danger">*</span></label>
            <input
                class="form-control @error('title') is-invalid @enderror"
                type="text"
                name="title"
                id="title"
                value="{{ $new->title }}"
                @error('title') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="mb-3">
            <label for="preview_image" class="form-label">Preview Image (268x300)</label>
                        <div class="mb-2">
                            <img class="bg-dark" id="preview_image_preview" src="{{  $new ? asset('/storage/' . $new->preview_image) : '' }}" alt="">
                        </div>
            <input
                class="form-control @error('preview_image') is-invalid @enderror"
                type="file"
                id="preview_image"
                name="preview_image">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
                        <div class="mb-2">
                            <img id="image_preview" class="bg-dark" src="{{  $new ? asset('/storage/' . $new->image) : '' }}" alt="">
                        </div>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="event_image" class="form-label">Event Preview Image (389x300) (optional)</label>
                        <div class="mb-2">
                            <img id="event_image_preview" class="bg-dark" src="{{  $new->event_image ? asset('/storage/' . $new->event_image) : '' }}" alt="">
                        </div>
            <input class="form-control" type="file" id="event_image" name="event_image">
        </div>

        <div class="mb-3">
            <label for="content">Content <span class="text-danger">*</span></label>
            <textarea class="form-control" name="content" id="summernote">{{ $new->content }}</textarea>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="category_id">Select Category (optional)</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                    <option selected>-- Choose category --</option>
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id === $new->category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="save_post">Save</button>
    </form>

@endsection
