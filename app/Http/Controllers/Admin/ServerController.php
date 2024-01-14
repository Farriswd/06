<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Server\StoreRequest;
use App\Http\Requests\Admin\Server\UpdateRequest;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServerController extends Controller
{
    public function index() {
        $servers = Server::all();
        return view('admin.servers.index', compact('servers'));
    }

    public function create() {
        return view('admin.servers.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images/servers', $data['image']);
        } else {
            unset($data['image']);
        }

        Server::create($data);

        return redirect()->route('admin.servers.index')->with('success', 'Server successfully added');
    }

    public function edit(Server $server) {
        return view('admin.servers.edit', compact('server'));
    }

    public function update(UpdateRequest $request, Server $server) {
        $data = $request->validated();

        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images/servers', $data['image']);
        } else {
            unset($data['image']);
        }

        $server->update($data);

        return response()->json(['success' => true, 'data' => $server]);
    }

    public function delete(Server $server) {
        $res = $server->delete();

        if (!$res) return response()->json(['error' => true, 'data' => $res]);
        return response()->json(['success' => true, 'message' => 'Server was deleted successfully!']);
    }
}
