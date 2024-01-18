<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameAuthAccount;
use App\Models\GameTelecasterCharacter;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class IndexController extends Controller
{
    public function index() {
        dd(mt_rand(100000, 999999));
        $totalAccounts = GameAuthAccount::all()->count();
        $totalCharacters = 0;
        $servers = Server::all();
        if ($servers->count() > 0) {
            foreach ($servers as $server) {
                DB::connection('telecaster_db')->disconnect();
                    Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
                DB::reconnect('telecaster_db');
                    $characters = GameTelecasterCharacter::all()->count();
                    $totalCharacters += $characters;
            }
        }
        return view('admin.index', compact('totalAccounts', 'totalCharacters'));
    }
}
