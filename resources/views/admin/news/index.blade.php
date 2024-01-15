@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>All News <a href="{{ route('admin.news.create') }}"><span class="badge bg-primary"><i class="fas fa-plus"></i></span></a></h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($news->count() > 0)
                            @foreach($news as $new)
                        <tr id="new_{{ $new->id }}">
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ asset('/storage/' . $new->preview_image) }}" class="avatar me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $new->title }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="ps-4">
                                {{ $new->category ? $new->category->title : 'No Category' }}
                            </td>
                            <td class="ps-4">
                                {{ $new->created_at->format('d/M/Y') }}
                            </td>
                            <td class="ps-4">
                                <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="#" class="btn btn-danger delete_new" data-id="{{ $new->id }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        @else
                            <h2 class="px-5">No News found</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $news->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
