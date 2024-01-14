<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\UpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index() {
        $settings = Setting::all()->first();
        return view('admin.settings', compact('settings'));
    }

    public function update(UpdateRequest $request) {
        $data = $request->validated();
        $settings = Setting::all()->first();
        $data['header_logo'] = isset($data['header_logo']) ? Storage::disk('public')->put('images', $data['header_logo']) : null;
        $data['main_logo']= isset($data['main_logo']) ? Storage::disk('public')->put('images', $data['main_logo']) : null;
        $data['footer_logo'] = isset($data['footer_logo']) ? Storage::disk('public')->put('images', $data['footer_logo']) : null;

        if (!$data['header_logo']) unset($data['header_logo']);
        if (!$data['main_logo']) unset($data['main_logo']);
        if (!$data['footer_logo']) unset($data['footer_logo']);

        if (!$settings) {
            $setting = Setting::create($data);
            return response()->json(['success' => true, 'data' => $setting]);
        }

            $settings->update($data);
        return response()->json(['success' => true, 'data' => $settings]);
    }
}
