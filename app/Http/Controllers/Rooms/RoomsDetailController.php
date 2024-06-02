<?php

namespace App\Http\Controllers\Rooms;

use App\Models\Rooms\Room;
use App\Models\Hotels\Hotel;
use App\Http\Controllers\Controller;
use App\Models\Bookings\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DateTime;

class RoomsDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['booking', 'payWithPaypal', 'success']);
    }

    public function rooms($id)
    {
        $getRooms = Room::where('hotel_id', $id)->orderBy('id', 'desc')->take(6)->get();
        return view("rooms.rooms", compact('getRooms'));
    }

    public function details($id)
    {
        $roomDetails = Room::findOrFail($id);
        return view("rooms.details", compact('roomDetails'));
    }

    public function booking(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $hotel = Hotel::findOrFail($room->hotel_id); // Fetch hotel based on room's hotel_id

        // Ensure date format is consistent
        $checkIn = DateTime::createFromFormat('m/d/Y', $request->check_in);
        $checkOut = DateTime::createFromFormat('m/d/Y', $request->check_out);

        if (!$checkIn || !$checkOut) {
            return redirect()->back()->withErrors(['check_in' => 'Invalid date format']);
        }

        $checkIn = $checkIn->format('Y-m-d');
        $checkOut = $checkOut->format('Y-m-d');

        // Compare dates in the proper format
        $currentDate = new DateTime();
        $currentDateStr = $currentDate->format('Y-m-d');

        if ($currentDateStr < $checkIn && $currentDateStr < $checkOut) {
            if ($checkIn < $checkOut) {
                $dateTime1 = new DateTime($checkIn);
                $dateTime2 = new DateTime($checkOut);
                $interval = $dateTime1->diff($dateTime2);
                $days = $interval->format("%a");

                // Validate the incoming request data
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'phone_number' => 'required|string|max:20',
                    'check_in' => 'required|date',
                    'check_out' => 'required|date|after_or_equal:check_in',
                ]);

                // Calculate the total price
                $totalPrice = $room->price * $days;

                // Create a new booking record
                Booking::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'days' => $days,
                    'price' => $totalPrice,
                    'user_id' => Auth::id(),
                    'room_name' => $room->name,
                    'hotel_name' => $hotel->name,
                    'status' => 'pending',
                ]);

                $price = Session::put('price', $totalPrice);
                $getPrice = Session::get($price);
                return redirect::route('room.booking.pay');

            } else {
                return redirect()->route('room.details', $room->id)->withErrors(['check_out' => 'Invalid check-out date']);
            }
        } else {
            return redirect()->route('room.details',$room->id)->withErrors(['check_in' => 'Invalid check-in or check-out date']);
        }
    }

    public function payWithPaypal()
    {
        return view('rooms.payment.pay');
    }

    public function success()
    {
        Session::forget('price');
        return view('rooms.payment.success');
    }
}