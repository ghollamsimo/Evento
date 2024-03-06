<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Event;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);

        return view('welcome' , compact('events'));
    }


    public function search(Request $request)
    {
        $events = Event::paginate(6);
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $eventSearchResults = Event::where('name', 'like', '%' . $searchQuery . '%')->paginate(6);
        } else {
            $eventSearchResults = $events;
        }
        return view('welcome', compact('eventSearchResults', 'events'));
    }


    public function filter(){

    }

    public function singleevent(Event $event){
        return view('pages.eventclient', [
            'event' => $event
        ]);
    }
}
