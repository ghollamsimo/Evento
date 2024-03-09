<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Categorie;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $organizerQuery = Organizer::where('user_id', Auth::id());
        $organizer = $organizerQuery->first();
        $organizerId = $organizer ? $organizer->id : null;
        $evntcount = Event::withCount('reservations');
        $events = Event::where('organizer_id', $organizerId)->with('organizer')->get();
        $catrgories = Categorie::all();
        return view('organizer.dashboard', compact('events'  ,'catrgories', 'organizerId' , 'evntcount'));
    }
    public function create(EventRequest $request){
        $validatedData = $request->validate($request->rules());
        $organizerId = Organizer::where('user_id', Auth::id())->first();
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->storeAs('/public/images', $imageName);

        Event::create([
            'name' => $validatedData['name'],
            'categorie_id' => $validatedData['categorie_id'],
            'localisation' => $validatedData['localisation'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'date'=> $validatedData['date'],
            'capacity' => $validatedData['capacity'],
            'organizer_id' => $organizerId->id
        ]);
        return redirect()->back()->with('Success' , 'Events SuccessFully Added');
    }
    public function update(Request $request , Event $id){
        $request->validate([
            'eventname' => 'required',
            'eventlocalisation' => 'required',
            'eventdiscription' => 'required',
            'categorie' => 'required',
            'eventimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eventdate' => 'required',
            'eventcapacity' => 'required',
        ]);

        $image = $request->file('eventimage');
        $imageName = time().'.'.$image->extension();
        $image->storeAs('public/images', $imageName);

        $id->update([
            'name' => $request->eventname,
            'localisation' => $request->eventlocalisation,
            'description' => $request->eventdiscription,
            'image' => $imageName,
            'categorie_id' => $request->categorie,
            'date'=> $request->eventdate,
            'capacity' => $request->eventcapacity,
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


    public function toggleStatus(Request $request, User $user)
    {
        // dd($request);
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $user->update(['status' => !$user->status]);
        // dd($user->status);
        if ($user->status === true) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized. User is banned.']);
        }

        return back()->with('success', 'User status updated successfully.');
    }
}
