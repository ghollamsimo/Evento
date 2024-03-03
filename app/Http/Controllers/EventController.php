<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('organizer.dashboard' , compact('events'));
    }
    public function create(EventRequest $request){
        $validatedData = $request->validate($request->rules());

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('public/images'), $imageName);
        } else {
            $imageName = null;
        }

        Event::create([
            'name' => $validatedData['name'],
            'localisation' => $validatedData['localisation'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'date'=> $validatedData['date'],
            'capacity' => $validatedData['capacity']
        ]);

        return redirect()->back();
    }


    public function update(Request $request , Event $id){
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('public/images'), $imageName);
        } else {
            $imageName = null;
        }

        $request->validate([
            'eventname' => 'required',
            'eventlocalisation' => 'required',
            'eventdiscription' => 'required',
            'eventimage' => $imageName,
            'eventdate' => 'required',
            'eventcapacity' => 'required'
        ]);

        $id->update([
            'name' => $request->eventname,
            'localisation' => $request->eventlocalisation,
            'description' => $request->eventdiscription,
            'image' => $imageName,
            'date'=> $request->eventdate,
            'capacity' => $request->eventcapacity
        ]);

        return redirect()->back();
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back();
    }
}
