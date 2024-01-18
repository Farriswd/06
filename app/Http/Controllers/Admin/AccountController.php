<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\StoreRequest;
use App\Http\Requests\Admin\Account\UpdateRequest;
use App\Models\GameAuthAccount;
use App\Models\GameTelecasterCharacter;
use App\Models\Server;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index() {
        $accounts = User::paginate(5);
        $servers = Server::all();
        if ($servers->count() < 1) return redirect()->back()->with('error', 'You need to add server!');
        /* Disable the counting of all characters on different servers cause it takes too much time */
//        foreach ($accounts as $account) {
//            $charactersCountForAccount = 0;
//            foreach ($servers as $key => $server) {
//                DB::connection('telecaster_db')->disconnect();
//                Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
//                DB::reconnect('telecaster_db');
//
//                $charactersCount = isset($account->GameAccountInfo->Characters) ? $account->GameAccountInfo->Characters->count() : 0;
//
//                $charactersCountForAccount += $charactersCount;
//            }
//
//            $account->charactersCount = $charactersCountForAccount;
//        }


        return view('admin.accounts.index', compact('accounts'));
    }

    public function edit(User $account) {
        $servers = Server::all();
        if ($servers->count() < 1) return redirect()->back()->with('error', 'You need to add server!');
        $account->gameCharacters = collect();
        foreach ($servers as $server){

                DB::connection('telecaster_db')->disconnect();
                Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
                DB::reconnect('telecaster_db');

                $characters = $account->GameAccountInfo->Characters;

                foreach ($characters as $character) {
                    $character->server_name = $server->title;
                }
                $serverInfo = [
                    'characters' => $characters->toArray(),
                ];
                $account->gameCharacters = $account->gameCharacters->merge($characters->toArray());
        }

        return view('admin.accounts.edit', compact('account'));
    }

    public function update(UpdateRequest $request, User $account) {
        $data = $request->validated();
        $salt = env('DB_PASSWORD_SALT');
        $webAccountBalance = $data['balance'];
        unset($data['balance']);

        if (isset($data['password'])) {
            $webAccountPassword = Hash::make($data['password']);
            $data['password'] = md5($salt.$data['password']);
            $account->password = $webAccountPassword;
        } else {
            unset($data['password']);
        }

        $account->balance = $webAccountBalance;
        $account->save();
        $gameAccount = $account->GameAccountInfo;

        $gameAccount->update($data);
        return response()->json(['success' => true, 'webAccount' => $account, 'gameAccount' => $gameAccount]);
    }
}
