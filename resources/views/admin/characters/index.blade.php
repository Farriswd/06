@extends('admin.layouts.main')

@section('content')
    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Account Characters ({{ $characters->count() }})</h6>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Race</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Job</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Level</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Guild</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($characters->count() > 0)
                        @foreach($characters as $character)

                            <tr>
                                <td class="ps-4">
                                    <p class="text-dark font-weight-bold">{{ $character->name }}</p>
                                </td>
                                <td class="ps-4">
                                    <p class="text-dark font-weight-bold">{{ $character->RaceName }}</p>
                                </td>
                                <td>
                                    <img src="{{ asset('jobs/'.$character->job.'.jpg') }}" alt="">
                                </td>
                                <td>
                                    <p class="text-dark font-weight-bold">{{ $character->lv }}</p>
                                </td>
                                <td>
                                    non
                                    {{--                                @if($character->CharacterGuild)--}}
                                    {{--                                <div class="d-flex">--}}
                                    {{--                                    <div>--}}
                                    {{--                                        <img src="{{ asset('/gicons/'.$character->CharacterGuild->GuildInfo->icon) }}" class="me-2">--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="my-auto">--}}
                                    {{--                                        <h6 class="mb-0 text-xs">{{ $character->CharacterGuild->GuildInfo->name }}</h6>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    {{--                                @endif--}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.characters.edit', ['server' => $server->id, 'character' => $character->sid]) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <h3 class="p5"> No Characters On Server</h3>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $characters->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
