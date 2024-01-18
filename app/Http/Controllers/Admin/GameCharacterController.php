<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameCharacter\UpdateRequest;
use App\Models\GameTelecasterCharacter;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GameCharacterController extends Controller
{
    public function index(Server $server) {
        Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
        $characters = GameTelecasterCharacter::paginate(10);
        return view('admin.characters.index', compact('characters', 'server'));
    }

    public function edit( $server, $character) {
        $server = Server::find($server);
        Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
        $character = GameTelecasterCharacter::find($character);
        return view('admin.characters.edit', compact('server', 'character'));
    }

    public function update(UpdateRequest $request, $server, $character) {
        $data = $request->validated();
        $server = Server::find($server);
        Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
        $character = GameTelecasterCharacter::find($character);
        $character->update($data);
        return  response()->json(['success' => true, 'data' => $character]);
    }
}
