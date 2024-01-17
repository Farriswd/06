@extends('admin.layouts.main')

@section('content')
    <h2>Edit Account</h2>
    <form id="edit_account">
        <div class="form-group">
            <label for="account" class="form-control-label">Account <span class="text-danger">*</span></label>
            <input
                class="form-control @error('account') is-invalid @enderror"
                type="text"
{{--                name="account"--}}
                id="account"
                disabled
                @error('account') placeholder="{{ $message }}" @enderror
                value="{{ $account->GameAccountInfo->account }}">
        </div>
        <div class="form-group">
            <label for="password" class="form-control-label">Password (leave field empty if you don't wanna change password)</label>
            <input
                class="form-control @error('password') is-invalid @enderror"
                type="password"
                name="password"
                id="password">
        </div>
        <div class="form-group">
            <label for="email" class="form-control-label">Email <span class="text-danger">*</span></label>
            <input
                class="form-control @error('email') is-invalid @enderror"
                type="text"
                name="email"
                id="email"
                @error('email') placeholder="{{ $message }}" @enderror
                value="{{ $account->GameAccountInfo->email }}">
        </div>
        <div class="form-group">
            <label for="Admin">Is Admin</label>
            <select class="form-control" id="Admin" name="Admin">
                <option value="0" {{ $account->GameAccountInfo->Admin < 1 ? 'selected' : '' }}>No</option>
                <option value="1" {{ $account->GameAccountInfo->Admin > 0 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="block">Is Blocked</label>
            <select class="form-control" id="block" name="block">
                <option value="0" {{ $account->GameAccountInfo->block < 1 ? 'selected' : '' }}>No</option>
                <option value="1" {{ $account->GameAccountInfo->block > 0 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="balance" class="form-control-label">Balance <span class="text-primary font-weight-bold">SA</span></label>
            <input
                class="form-control @error('balance') is-invalid @enderror"
                type="number"
                name="balance"
                id="balance"
                @error('balance') placeholder="{{ $message }}" @enderror
                value="{{ $account->balance }}">
        </div>
        <div class="mb-3">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Account Characters</h6>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Job</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Level</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Guild</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Server</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($account->gameCharacters)

                        @foreach($account->gameCharacters as $character)

                        <tr>
                            <td class="ps-4">
                                <p class="text-dark font-weight-bold">{{ $character['name'] }}</p>
                            </td>
                            <td>
                                <img src="{{ asset('jobs/'.$character['job'].'.jpg') }}" alt="">
                            </td>
                            <td>
                                <p class="text-dark font-weight-bold">{{ $character['lv'] }}</p>
                            </td>
                            <td>
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
                                <p class="text-dark font-weight-bold">{{ $character['server_name'] }}</p>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit" id="save_account">Save</button>
    </form>

@endsection
