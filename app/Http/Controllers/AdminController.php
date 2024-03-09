<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientcount = Client::count();
        $categoriecount = Categorie::count();
        $categories = Categorie::all();

        $users = User::where('role', 'Client')
            ->orWhere('role', 'Organizer')
            ->get();

        $events = Event::where('status', 0)
            ->get();
        return view('admin.dashboard' , compact('categories' , 'clientcount' ,'categoriecount' , 'users' ,'events'));

    }

    public function blockAccess(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $request->validate([
            'status' => 'required',
        ]);
        $user->update([
            'status' => $request->status,
        ]);

        if ($user->status === true) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized. User is banned.']);
        }

        return redirect()->back();
    }
    public function publication (Request $request , $eventId){

        $event = Event::findOrFail($eventId);
        $event->update([
            'status' => $request->status,
        ]);

        return redirect()->back();

    }
}
