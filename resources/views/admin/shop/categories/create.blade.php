@extends('admin.layouts.main')

@section('content')
    <h2>Create Category</h2>
    <form method="post" action="{{ route('admin.shop.categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="title" class="form-control-label">Title <span class="text-danger">*</span></label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" @error('title') placeholder="{{ $message }}" @enderror>
        </div>

        <button class="btn btn-primary" type="submit" id="create_shop_category">Create</button>
    </form>

@endsection
