@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-3 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>All Categories <a href="{{ route('admin.news.categories.create') }}"><span class="badge bg-primary"><i class="fas fa-plus"></i></span></a></h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($categories->count() > 0)
                            @foreach($categories as $category)
                        <tr id="category_{{ $category->id }}">
                            <td class="ps-4">
                                {{ $category->title }}
                            </td>
                            <td class="ps-4">
                                <a href="{{ route('admin.news.categories.edit', $category->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="#" class="btn btn-danger delete_category" data-id="{{ $category->id }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        @else
                            <h2 class="px-5">No Categories found</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
