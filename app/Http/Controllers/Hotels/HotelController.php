<?php

namespace App\Http\Controllers\Hotels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Models\Hotels\Hotel;


class HotelController extends Controller
{
    public function index()
    {
        $hotels = Cache::remember('hotels', 3600, function () {
            return Hotel::paginate(10);
        });

        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|max:2048', // Max size 2MB
                'description' => 'required|string',
                'location' => 'required|string|max:255',
            ]);
        
            $hotel = Hotel::findOrFail($id);
        
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/assets/images/hotels/'), $imageName);
                $hotel->image = $imageName;
            }
        
            $hotel->name = $request->name;
            $hotel->description = $request->description;
            $hotel->location = $request->location;
            $hotel->save();
        
            Cache::forget('hotels');
        
            return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
        
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|max:2048', // Max size 2MB
                'description' => 'required|string',
                'location' => 'required|string|max:255',
            ]);
        
            $hotel = Hotel::findOrFail($id);
        
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/assets/images/hotels/'), $imageName);
                $hotel->image = $imageName;
            }
        
            $hotel->name = $request->name;
            $hotel->description = $request->description;
            $hotel->location = $request->location;
            $hotel->save();
        
            Cache::forget('hotels');
        
            return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
        
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        Cache::forget('hotels');

        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}
