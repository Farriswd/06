@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>All Servers <a href="{{ route('admin.servers.create') }}"><span class="badge bg-primary"><i class="fas fa-plus"></i></span></a></h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Auth Ip</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Auth Port</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($servers->count() > 0)
                            @foreach($servers as $server)
                        <tr id="server_{{ $server->id }}">
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ asset('/storage/' . $server->image) }}" class="avatar me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $server->title }} @if(checkServerStatus($server->auth_ip, $server->auth_port) === 'Online') <span class="badge bg-gradient-success">On</span> @else <span class="badge bg-gradient-danger">Off</span> @endif</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $server->auth_ip }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $server->auth_port }}
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('admin.servers.edit', $server->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="#" class="btn btn-danger delete_server" data-id="{{ $server->id }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        @else
                            <h2 class="px-5">No Servers found</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
