@extends('admin.layouts.main')

@section('content')
    <h2>Create New Product</h2>
    <form id="update_shop_product" method="post" action="{{ route('admin.shop.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="form-control-label">Title <span class="text-danger">*</span></label>
            <input
                class="form-control @error('title') is-invalid @enderror"
                type="text"
                name="title"
                id="title"
                value="{{ $product->title }}"
                @error('title') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                        <div class="mb-2">
                            <img id="image_preview" class="bg-dark" src="{{ asset('/storage/' . $product->image) }}" alt="">
                        </div>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="description">Description <span class="text-danger">*</span></label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price" class="form-control-label">Price <span class="text-danger">*</span></label>
            <input
                class="form-control @error('price') is-invalid @enderror"
                type="number"
                name="price"
                id="price"
                value="{{ $product->price }}"
                @error('price') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="form-group">
            <label for="game_item_id" class="form-control-label">Game Item Id <span class="text-danger">*</span></label>
            <input class="form-control @error('game_item_id') is-invalid @enderror" type="number" name="game_item_id" id="game_item_id" value="{{ $product->game_item_id }}" @error('game_item_id') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="is_published">Is Published (select)</label>
                <select class="form-control @error('is_published') is-invalid @enderror" id="is_published" name="is_published">
                    <option value="1" {{ $product->is_published === 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $product->is_published === 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="category_id">Select Category (optional)</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="save_shop_product">Save</button>
    </form>

@endsection
