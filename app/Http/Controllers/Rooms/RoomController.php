<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Models\Rooms\Room;
use App\Models\Hotels\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Cache::remember('rooms', 60, function () {
            return Room::with('hotel')->paginate(10);
        });

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('rooms.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'max_person' => 'required|integer',
            'size' => 'required|numeric|min:0',
            'view' => 'required|string|max:255',
            'nums_bed' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/assets/images/rooms/'), $imageName);

        Room::create([
            'name' => $request->name,
            'image' => $imageName,
            'max_person' => $request->max_person,
            'size' => $request->size,
            'view' => $request->view,
            'nums_bed' => $request->nums_bed,
            'price' => $request->price,
            'hotel_id' => $request->hotel_id,
        ]);

        Cache::forget('rooms');

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $hotels = Hotel::all();
        return view('rooms.edit', compact('room', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'max_person' => 'required|integer',
            'size' => 'required|numeric|min:0',
            'view' => 'required|string|max:255',
            'nums_bed' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $room = Room::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/images/rooms/'), $imageName);
            $room->image = $imageName;
        }

        $room->name = $request->name;
        $room->max_person = $request->max_person;
        $room->size = $request->size;
        $room->view = $request->view;
        $room->nums_bed = $request->nums_bed;
        $room->price = $request->price;
        $room->hotel_id = $request->hotel_id;
        $room->save();

        Cache::forget('rooms');

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function show($id)
    {
        $room = Room::with('hotel')->findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        Cache::forget('rooms');

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
