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
        <div class="form-group">
            <label for="game_ip" class="form-control-label">Game IP</label>
            <input class="form-control @error('game_ip') is-invalid @enderror" @error('game_ip') placeholder="{{ $message }}" @enderror value="{{ $server->game_ip }}" type="text" name="game_ip" id="game_ip">
        </div>
        <div class="form-group">
            <label for="game_port" class="form-control-label">Game Port</label>
            <input class="form-control @error('game_port') is-invalid @enderror" @error('game_port') placeholder="{{ $message }}" @enderror value="{{ $server->game_port }}" type="text" name="game_port" id="game_port">
        </div>
        <div class="form-group">
            <label for="game_console_port" class="form-control-label">Game Console Port</label>
            <input class="form-control @error('game_console_port') is-invalid @enderror" @error('game_console_port') placeholder="{{ $message }}" @enderror value="{{ $server->game_console_port }}" type="text" name="game_console_port" id="game_console_port">
        </div>
        <div class="form-group">
            <label for="db_ip" class="form-control-label">DB IP</label>
            <input class="form-control @error('db_ip') is-invalid @enderror" @error('db_ip') placeholder="{{ $message }}" @enderror value="{{ $server->db_ip }}" type="text" name="db_ip" id="db_ip">
        </div>
        <div class="form-group">
            <label for="db_port" class="form-control-label">DB Port</label>
            <input class="form-control @error('db_port') is-invalid @enderror" @error('db_port') placeholder="{{ $message }}" @enderror value="{{ $server->db_port }}" type="text" name="db_port" id="db_port">
        </div>
        <div class="form-group">
            <label for="username" class="form-control-label">DB Username</label>
            <input class="form-control @error('username') is-invalid @enderror" @error('username') placeholder="{{ $message }}" @enderror value="{{ $server->username }}" type="text" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password" class="form-control-label">DB Password</label>
            <input class="form-control @error('password') is-invalid @enderror" @error('password') placeholder="{{ $message }}" @enderror value="{{ $server->password }}" type="text" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="telecaster_db" class="form-control-label">Telecaster DB Name</label>
            <input class="form-control @error('telecaster_db') is-invalid @enderror" @error('telecaster_db') placeholder="{{ $message }}" @enderror value="{{ $server->telecaster_db }}" type="text" name="telecaster_db" id="telecaster_db">
        </div>
        <div class="form-group">
            <label for="arcadia_db" class="form-control-label">Arcadia DB Name</label>
            <input class="form-control @error('arcadia_db') is-invalid @enderror" @error('arcadia_db') placeholder="{{ $message }}" @enderror value="{{ $server->arcadia_db }}" type="text" name="arcadia_db" id="arcadia_db">
        </div>

        <button class="btn btn-primary" type="submit" id="update_server">Save</button>
    </form>

@endsection
