<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
