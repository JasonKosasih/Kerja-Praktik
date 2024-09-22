<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginLog;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // After login, save login information
    protected function authenticated(Request $request, $user)
    {
        // Save the login information
        LoginLog::create([
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'logged_in_at' => now(),
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
