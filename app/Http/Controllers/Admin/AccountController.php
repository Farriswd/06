<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\StoreRequest;
use App\Models\GameAuthAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index() {
        $accounts = User::paginate(10);
        return view('admin.accounts.index', compact('accounts'));
    }

    public function edit(User $account) {
        return view('admin.accounts.edit', compact('account'));
    }

    public function update(StoreRequest $request, User $account) {
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
