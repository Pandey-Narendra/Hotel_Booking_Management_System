<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bookings\Booking;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function myBooking(){
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login'); // Redirect to login if user is not authenticated
        }

        $bookings = Booking::where('user_id', $user->id)
                    ->orderBy('id', 'desc')
                    ->get();

        return view('users.bookings', compact('bookings'));
    }
}
