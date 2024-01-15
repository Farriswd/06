<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameAuthAccount;
use App\Models\GameTelecasterCharacter;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $totalAccounts = GameAuthAccount::all()->count();
        $totalCharacters = GameTelecasterCharacter::all()->count();
        return view('admin.index', compact('totalAccounts', 'totalCharacters'));
    }
}
