<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $u = User::orderBy('id', 'desc')->Paginate(10);
        return view('backend/user/index', compact('u'));
    }

    public function createform()
    {
        return view('backend/user/createform');
    }

    public function insert(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = $request->password; // Hash the password
            $user->save();

            alert()->success('Successfully Saved', 'บันทึกสำเร็จ');
            return redirect('admin/user/index');
        } catch (\Exception $e) {
            // Log the error and show a generic error message
            \Log::error('User insertion failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while saving the user.'])->withInput();
        }
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        alert()->success('Successfully Deleted','ลบข้อมูลสำเร็จ');
        return redirect('admin/user/index');
    }
}
