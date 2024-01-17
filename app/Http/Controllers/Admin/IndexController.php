<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameAuthAccount;
use App\Models\GameTelecasterCharacter;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class IndexController extends Controller
{
    public function index() {
        $totalAccounts = GameAuthAccount::all()->count();
        $totalCharacters = 0;
        $servers = Server::all();
        if ($servers->count() > 0) {
            foreach ($servers as $server) {
                if ($server->telecaster_db === 'Telecaster') {
                    Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
                    $characters = GameTelecasterCharacter::all()->count();
                    $totalCharacters += $characters;
                } else {
                    continue;
                }
            }
        }
        return view('admin.index', compact('totalAccounts', 'totalCharacters'));
    }
}
