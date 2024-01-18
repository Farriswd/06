@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>All Products <a href="{{ route('admin.shop.products.create') }}"><span class="badge bg-primary"><i class="fas fa-plus"></i></span></a></h6>
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products->count() > 0)
                            @foreach($products as $product)
                        <tr id="new_{{ $product->id }}">
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ asset('/storage/' . $product->image) }}" class="avatar me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $product->title }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="ps-4">
                                {{ $product->category ? $product->category->title : 'No Category' }}
                            </td>
                            <td class="ps-4">
                                {{ $product->price }} <span class="text-primary font-weight-bold">SA</span>
                            </td>
                            <td class="ps-4">
                                <a href="{{ route('admin.shop.products.edit', $product->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="#" class="btn btn-danger delete_shop_product" data-id="{{ $product->id }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        @else
                            <h2 class="px-5">No Products found</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
