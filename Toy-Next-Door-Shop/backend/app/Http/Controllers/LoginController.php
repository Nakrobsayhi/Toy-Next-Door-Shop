<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        return redirect('http://127.0.0.1:3000/frontend/index.html');
    }
}
