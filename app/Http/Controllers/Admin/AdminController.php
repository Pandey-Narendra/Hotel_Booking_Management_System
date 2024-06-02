<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin\Admin;
use App\Models\Hotels\Hotel;
use App\Models\Rooms\Room;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function checkLogin(Request $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index(){
        $admin = Admin::select()->count();
        $hotel = Hotel::select()->count();
        $room = Room::select()->count();
        return view('admin.index', compact('admin', 'hotel', 'room'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }


    public function admins(){
        $admin = Admin::select()->orderBy('id', 'desc')->get();
        return view('admin.admin', compact('admin'));
    }

    public function create(){
        return view('admin.create');
    }

    public function createAdmin(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Create new admin
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password')); // Hash the password
        $admin->save();

        // dd($request);
        // Redirect back with a success message
        return redirect()->route('admin.create')->with('success', 'Admin created successfully');
    }
}
