<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Client;
use App\Models\Event;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 1)->paginate(10);
        $categories = Categorie::all();
        return view('welcome' , compact('events', 'categories'));
    }


    public function search(Request $request)
    {
        $query = Event::where('status', 1);
        $searchQuery = $request->input('search');
        $query->where('name', 'like', '%' . $searchQuery . '%');
        $categoryFilter = $request->input('categorie');
        if ($categoryFilter && $categoryFilter !== 'All') {
            $query->where('categorie_id', $categoryFilter);
        }
        $events = $query->paginate(10);
        $categories = Categorie::all();

        return view('welcome', compact('events', 'categories'));
    }


    public function filterEvents(Request $request)
    {
        $categoryId = $request->input('id');


        $query = Event::query();

        if ($categoryId) {
            $query->where('categorie_id', $categoryId);
        }



        $events = $query->with('categories')->get();

        return view('welcome', ['events' => $events])->render();
    }

    public function singleevent(Event $event){
        return view('pages.eventclient', [
            'event' => $event
        ]);
    }
}
