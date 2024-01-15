<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GameAuthAccount;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $gameUserMaxId = GameAuthAccount::max('account_id');
        $accountId = $gameUserMaxId + 1;
        $salt = env('DB_PASSWORD_SALT');

        $newGameUser = GameAuthAccount::create([
            'account_id' => $accountId,
            'account' => $request->name,
            'password' => md5($salt.$request->password),
            'email' => $request->email,
            'password2' => 'rappelztestpassword123',
            'block' => 0,
            'IP_user' => $request->ip(),
            'last_login_server_idx' => 1,
            'Admin' => 0,
            'point' => 0,
            'datePassword' => Carbon::now()->format('Y-m-d'),
            'pk_' => 1,
            'creationDate_' => Carbon::now(),
            'updateDate_' => null,
            'creatorId_' => null,
            'updatorId_' => null,
            'portId_' => 'rappelz',
            'type_' => 'rappelz',
            'accessDate_' => 0
        ]);

        if (!$newGameUser) return redirect()->back()->with('error', 'Error Account Not Created. Try Again');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
