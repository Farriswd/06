@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between">
            <h3 class="p-3">Order by <span class="text-primary">{{ $order->user->name }}</span></h3>
            <h3 class="p-3">Total: <span class="text-primary">{{ $order->total_price }} SA</span></h3>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                </tr>
                </thead>
                <tbody>
                @if($order->orderItems->count() >0)
                    @foreach($order->orderItems as $item)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="{{ asset('/storage/'. $item->product->image) }}" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-xs">{{ $item->product->title }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $item->product->category->title }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $item->unit_price }}</p>
                        <p class="text-xs text-secondary mb-0">SA</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{ $item->quantity }}</span>
                    </td>
                </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
