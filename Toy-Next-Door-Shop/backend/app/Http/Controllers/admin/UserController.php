<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $u = User::orderBy('id', 'desc')->Paginate(10);
        $members = Member::Paginate(10);
        return view('backend/user/index',compact('u', 'members'));
    }

    public function createform(){
        return view('backend/user/createform');
    }

    public function insert(Request $request)
    {
        $members = new Member();
        $members->member_id = $request->member_id;
        $members->name = $request->name;
        $members->phone = $request->phone;
        $members->email = $request->email;
        $members->save();
        alert()->success('Successfully Saved', 'บันทึกสำเร็จ');
        return redirect('admin/user/index');
    }

}