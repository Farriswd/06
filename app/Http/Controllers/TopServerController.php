<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharactersResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\SinglePostResource;
use App\Models\GameTelecasterCharacter;
use App\Models\News;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;

class TopServerController extends Controller
{
    public function index(Server $server) {
        Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
        return Inertia::render('Top/Index', [
            'server' => $server,
            'characters' => fn() => CharactersResource::collection(GameTelecasterCharacter::orderBy('lv', 'DESC')
                ->limit(100)
                ->where('lv', '!=', 0)
                ->get())
        ]);
    }

    public function getCharacters(Server $server) {
        Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
    }

}
