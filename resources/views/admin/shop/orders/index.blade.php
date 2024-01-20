@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
{{--                        <h6>All Products <a href="{{ route('admin.shop.products.create') }}"><span class="badge bg-primary"><i class="fas fa-plus"></i></span></a></h6>--}}
                        <h6>All Orders ({{ $orders->count() }})</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Account</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($orders->count() > 0)
                            @foreach($orders as $order)
                        <tr id="new_{{ $order->id }}">
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $order->id }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="ps-4">
                                {{ $order->user->name }}
                            </td>
                            <td class="ps-4">
                                {{ $order->created_at->format('d.m.Y') }}
                            </td>
                            <td class="ps-4">
                                {{ $order->total_price }} <span class="text-primary font-weight-bold">SA</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                            @endforeach
                        @else
                            <h2 class="px-5">No Orders found</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $orders->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
