@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>All Accounts <a href="{{ route('admin.accounts.create') }}"><span class="badge bg-primary"><i class="fas fa-plus"></i></span></a></h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Blocked</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Characters</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Balance</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Is Admin</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($accounts->count() > 0)
                            @foreach($accounts as $account)
                        <tr id="account_{{ $account->GameAccountInfo->account_id }}">
                            <td>
                                <h6 class="ps-3">{{ $account->GameAccountInfo->account }}</h6>
                            </td>
                            <td>
                                {{ $account->GameAccountInfo->email }}
                            </td>
                            <td>
                                @if($account->GameAccountInfo->block > 0)
                                    <span class="badge bg-gradient-danger">Yes</span>
                                @else
                                    <span class="badge bg-gradient-success">No</span>
                                @endif
                            </td>
                            <td>
                                {{ $account->GameAccountInfo->Characters->count() }}
                            </td>
                            <td>
                                {{ $account->balance }} <span class="text-primary font-weight-bold">SA</span>
                            </td>
                            <td class="align-middle text-center">
                                @if($account->GameAccountInfo->Admin > 0)
                                    <span class="badge bg-gradient-success">Yes</span>
                                @else
                                    <span class="badge bg-gradient-danger">No</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('admin.accounts.edit', $account->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="#" class="btn btn-danger delete_account" data-id="{{ $account->id }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        @else
                            <h2 class="px-5">No Accounts found</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $accounts->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
