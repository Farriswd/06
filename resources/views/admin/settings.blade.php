@extends('admin.layouts.main')

@section('content')
    <h2>Website Settings</h2>
    <form id="update_settings">
        <div class="form-group">
            <label for="title" class="form-control-label">Title <span class="text-danger">*</span></label>
            <input class="form-control" type="text" value="{{ $settings ? $settings->title : '' }}" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="header_logo" class="form-label">Header Logo (145x59)</label>
            <div class="mb-2">
                <img class="bg-dark" id="header_logo_preview" src="{{  $settings ? asset('/storage/' . $settings->header_logo) : '' }}" alt="">
            </div>
            <input class="form-control" type="file" id="header_logo" name="header_logo">
        </div>
        <div class="mb-3">
            <label for="main_logo" id="main_logo_preview" class="form-label">Main Logo (389x159)</label>
            <div class="mb-2">
                <img class="bg-dark" src="{{  $settings ? asset('/storage/' . $settings->main_logo) : '' }}" alt="">
            </div>
            <input class="form-control" type="file" id="main_logo" name="main_logo">
        </div>
        <div class="mb-3">
            <label for="footer_logo" id="footer_logo_preview" class="form-label">Footer Logo (145x59)</label>
            <div class="mb-2">
                <img class="bg-dark" src="{{  $settings ? asset('/storage/' . $settings->footer_logo) : '' }}" alt="">
            </div>
            <input class="form-control" type="file" id="footer_logo" name="footer_logo">
        </div>
        <div class="form-group">
            <label for="copyright_text">Copyright Text <span class="text-danger">*</span></label>
            <textarea class="form-control" id="summernote" name="copyright_text" rows="3">{{ $settings ? $settings->copyright_text : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="facebook_link" class="form-control-label">Facebook Link</label>
            <input class="form-control" type="text" value="{{ $settings ? $settings->facebook_link : '' }}" name="facebook_link" id="facebook_link">
        </div>
        <div class="form-group">
            <label for="discord_link" class="form-control-label">Discrod Link</label>
            <input class="form-control" type="text" value="{{ $settings ? $settings->discord_link : '' }}" name="discord_link" id="discord_link">
        </div>

        <button class="btn btn-primary" type="button" id="save_settings">Save</button>
    </form>

@endsection
