<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Server;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index() {
        return inertia('Profile/Index');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function getCharacters() {
        $account = auth()->user();
        $servers = Server::all();
        if ($servers->count() < 1) return response()->json(['message' => 'No server found']);
        $account->gameCharacters = collect();
        foreach ($servers as $server){
            DB::connection('telecaster_db')->disconnect();
            Config::set("database.connections.telecaster_db", ['driver' => 'sqlsrv','host' => $server->db_ip, 'port' => $server->db_port, 'database' => $server->telecaster_db, 'username' => $server->username, 'password'=>$server->password]);
            DB::reconnect('telecaster_db');

            $characters = $account->GameAccountInfo->Characters->filter(function ($character){
                return $character->lv !== '0';
            });

            foreach ($characters as $character) {
                $character->server_name = $server->title;
                $character->race = $character->RaceName;
                $character->job = url('/jobs/'. $character->job.'.jpg');
            }
            $serverInfo = [
                'characters' => $characters->toArray(),
            ];
            $account->gameCharacters = $account->gameCharacters->merge($characters->toArray());
        }
        return response()->json(['success' => true, 'data' => $account->gameCharacters]);
    }
}
