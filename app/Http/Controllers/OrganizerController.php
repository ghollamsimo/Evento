<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function validationreserve()
    {
        $organizer = Auth::user()->id;
        $organizerid = Organizer::where('user_id', $organizer)->first();
        $events = Reservation::with('client.user','event.organizer')
            ->where('status', 'Available')->get();
        return view('organizer.Reservalidation', compact('events'));
    }

    public function Reservationaccepted(Request $request ,$reservationevents ){
        $reservation = Reservation::findOrFail($reservationevents);
        $reservation->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
    public function destroy( $reservationevents ){
        $reservation = Reservation::findOrFail($reservationevents);
        $reservation->delete();
        return redirect()->back();
    }
}
