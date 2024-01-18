@extends('admin.layouts.main')

@section('content')
    <h2>Update Character</h2>
    <form id="edit_character">
        <div class="form-group">
            <label for="name" class="form-control-label">Name</label>
            <input
                class="form-control @error('name') is-invalid @enderror"
                type="text"
                name="name"
                id="name"
                value="{{ $character->name }}"
                @error('name') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="permission">is GM</label>
                <select class="form-control @error('permission') is-invalid @enderror" id="permission" name="permission">
                    <option value="0" {{ $character->permission == 0 ? 'selected' : '' }}>No</option>
                    <option value="100" {{ $character->permission == 100 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="sex">Sex</label>
                <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">
                    <option value="1" {{ $character->sex == 1 ? 'selected' : '' }}>Girl</option>
                    <option value="2" {{ $character->sex == 2 ? 'selected' : '' }}>Boy</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="race">Race</label>
                <select class="form-control @error('race') is-invalid @enderror" id="race" name="race">
                    <option value="3" {{ $character->race == 3 ? 'selected' : '' }}>Gaia</option>
                    <option value="4" {{ $character->race == 4 ? 'selected' : '' }}>Deva</option>
                    <option value="5" {{ $character->race == 5 ? 'selected' : '' }}>Asura</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="lv" class="form-control-label">Level</label>
            <input
                class="form-control @error('lv') is-invalid @enderror"
                type="number"
                min="0"
                name="lv"
                id="lv"
                value="{{ $character->lv }}"
                @error('lv') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="form-group">
            <label for="exp" class="form-control-label">Exp</label>
            <input
                class="form-control @error('exp') is-invalid @enderror"
                type="text"
                name="exp"
                id="exp"
                value="{{ $character->exp }}"
                @error('exp') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="form-group">
            <label for="talent_point" class="form-control-label">Talent Point</label>
            <input
                class="form-control @error('talent_point') is-invalid @enderror"
                type="number"
                min="0"
                name="talent_point"
                id="talent_point"
                value="{{ $character->talent_point }}"
                @error('talent_point') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="form-group">
            <label for="huntaholic_point" class="form-control-label">Huntaholic Point</label>
            <input
                class="form-control @error('huntaholic_point') is-invalid @enderror"
                type="number"
                min="0"
                name="huntaholic_point"
                id="huntaholic_point"
                value="{{ $character->huntaholic_point }}"
                @error('huntaholic_point') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="form-group">
            <label for="arena_point" class="form-control-label">Arena Point</label>
            <input
                class="form-control @error('arena_point') is-invalid @enderror"
                type="number"
                min="0"
                name="arena_point"
                id="arena_point"
                value="{{ $character->arena_point }}"
                @error('arena_point') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="form-group">
            <label for="job" class="form-control-label">Job ID</label>
            <input
                class="form-control @error('job') is-invalid @enderror"
                type="number"
                min="0"
                name="job"
                id="job"
                value="{{ $character->job }}"
                @error('job') placeholder="{{ $message }}" @enderror>
        </div>
        <div class="form-group">
            <label for="gold" class="form-control-label">Rupees</label>
            <input
                class="form-control @error('gold') is-invalid @enderror"
                type="number"
                min="0"
                name="gold"
                id="gold"
                value="{{ $character->gold }}"
                @error('gold') placeholder="{{ $message }}" @enderror>
        </div>
        <button class="btn btn-primary" type="submit" id="save_character">Save</button>
    </form>

@endsection
