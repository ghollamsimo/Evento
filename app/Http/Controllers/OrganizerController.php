<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function acceptation(Request $request)
    {
        $organisateur = Auth::user()->id;
        $idOrganisateur = Organizer::where('user_id', $organisateur)->first();
        $event = Reservation::with('clients.user','events.organizer')
            ->where('status', 0)->get();
        return view('organizer.', compact('event'));
    }

    public function acceptReservation(Request $request ,$eventReservation ){
        $reservation = Reservation::findOrFail($eventReservation);
        $reservation->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
    public function deleteReservation( $eventReservation ){
        $reservation = Reservation::findOrFail($eventReservation);
        $reservation->delete();
        return redirect()->back();
    }
}
