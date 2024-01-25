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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use mysql_xdevapi\Exception;

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
            'name' => 'required|string|max:255|unique:'.User::class,
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            DB::beginTransaction();
            //        $gameUserMaxId = GameAuthAccount::max('account_id'); //
//        $accountId = $gameUserMaxId + 1;
            $accountId = 0;
            do {
                $accountId = mt_rand(100000, 999999); // Или используйте другой диапазон
            } while (!$this->isAccountIdUnique($accountId));

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'game_account_id' => $accountId,
                'password' => Hash::make($request->password),
            ]);

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
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            Log::error('An error occurred during the register process: ' . $error->getMessage());
            return redirect()->route('index')->with('error', 'An occurred during the register process.' . $error->getMessage());
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    private function isAccountIdUnique($accountId)
    {
        return !GameAuthAccount::where('account_id', $accountId)->exists();
    }
}
