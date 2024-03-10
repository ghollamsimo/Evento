<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function validationreserve(Request $request)
    {
        $organizer = Auth::user()->id;
        $organizerid = Organizer::where('user_id', $organizer)->first();
        $event = Reservation::with('clients.user','events.organizer')
            ->where('status', 0)->get();
        return view('organizer.', compact('event'));
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
