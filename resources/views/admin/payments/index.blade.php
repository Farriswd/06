@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        {{--                        <h6>All Products <a href="{{ route('admin.shop.products.create') }}"><span class="badge bg-primary"><i class="fas fa-plus"></i></span></a></h6>--}}
                        <h6>All Payments ({{ $payments->count() }})</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Session ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Account</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($payments->count() > 0)
                            @foreach($payments as $payment)
                                <tr id="payment_{{ $payment->id }}">
                                    <td class="ps-4">
                                        <span class="font-weight-bold">{{ $payment->id }}</span>
                                    </td>
                                    <td class="ps-4">
                                        {{ $payment->session_id }}
                                    </td>
                                    <td class="ps-4">
                                        {{ $payment->user->name }}
                                    </td>
                                    <td class="ps-4">
                                        {{ $payment->created_at->format('d.m.Y') }}
                                    </td>
                                    <td class="ps-4">
                                        {{ $payment->amount }} <span class="text-primary font-weight-bold">$</span>
                                    </td>
                                    <td class="ps-4">
                                        {{ $payment->quantity }} <span class="text-primary font-weight-bold">SA</span>
                                    </td>
                                    <td class="ps-4">
                                        @switch($payment->status)
                                            @case('success')
                                            <span class="badge bg-gradient-success">{{ $payment->status }}</span>
                                            @break
                                            @case('pending')
                                            <span class="badge bg-gradient-warning">{{ $payment->status }}</span>
                                            @break
                                            @case('error')
                                            <span class="badge bg-gradient-danger">{{ $payment->status }}</span>
                                            @break
                                            @default
                                            <span class="badge bg-gradient-success">{{ $payment->status }}</span>
                                        @endswitch
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
                {{ $payments->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
