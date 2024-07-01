<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $u = User::orderBy('id', 'desc')->Paginate(10);
        return view('backend/user/index',compact('u'));
    }
}