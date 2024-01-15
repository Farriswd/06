@extends('admin.layouts.main')

@section('content')
    <h2>Edit Category</h2>
    <form id="edit_category">
        <div class="form-group">
            <label for="title" class="form-control-label">Title <span class="text-danger">*</span></label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" @error('title') placeholder="{{ $message }}" @enderror value="{{ $category->title }}">
        </div>

        <button class="btn btn-primary" type="submit" id="update_category">Save</button>
    </form>

@endsection
