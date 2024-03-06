<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $organizerId = Auth::id();
        $events = Event::where('organizer_id' , $organizerId)->with('organizer')->get();

        return view('organizer.dashboard', compact('events' , 'organizerId'));
    }

    public function create(EventRequest $request){
        $validatedData = $request->validate($request->rules());
        $organizerId = Organizer::where('user_id', Auth::id())->first();

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->storeAs('/public/images', $imageName);


        Event::create([
            'name' => $validatedData['name'],
            'localisation' => $validatedData['localisation'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'date'=> $validatedData['date'],
            'capacity' => $validatedData['capacity'],
            'organizer_id' => $organizerId->id
        ]);
        return redirect()->back();
    }

    public function update(Request $request , Event $id){
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('/public/images'), $imageName);
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

    public function singleevent(Event $event){
        $organizerId = Organizer::where('user_id', Auth::id())->first();
        return view('pages.eventpage' , ['event' => $event]);
    }


}
