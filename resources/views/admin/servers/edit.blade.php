@extends('admin.layouts.main')

@section('content')
    <h2>Edit Server</h2>
    <form id="edit_server">
        <div class="form-group">
            <label for="title" class="form-control-label">Title <span class="text-danger">*</span></label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" @error('title') placeholder="{{ $message }}" @enderror value="{{ $server->title }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Server Image (257x257)</label>
            <div class="mb-2 bg-dark">
                <img id="image_preview" src="{{ $server->image ? asset('/storage/' . $server->image) : '' }}">
            </div>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="auth_ip" class="form-control-label">Auth IP</label>
            <input class="form-control @error('auth_ip') is-invalid @enderror" @error('auth_ip') placeholder="{{ $message }}" @enderror value="{{ $server->auth_ip }}" type="text" name="auth_ip" id="auth_ip">
        </div>
        <div class="form-group">
            <label for="auth_port" class="form-control-label">Auth Port</label>
            <input class="form-control @error('auth_port') is-invalid @enderror" @error('auth_port') placeholder="{{ $message }}" @enderror value="{{ $server->auth_port }}" type="text" name="auth_port" id="auth_port">
        </div>

        <button class="btn btn-primary" type="submit" id="update_server">Save</button>
    </form>

@endsection
