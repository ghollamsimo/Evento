<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Client;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index()
    {
        $user = Auth::user()->id;
        $idClient = Client::where('user_id' , $user)->first();
        $reservations = Reservation::with('client.user','event.organizer')->where('status','Booked')
            ->where('client_id' , $idClient->id)
            ->get();
        return view('pages.ticket', compact( 'reservations'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create(ReservationRequest $request, $eventId)
    {
        $validatedData = $request->validated();
        $event = Event::findOrFail($eventId);
        $client = Client::where('user_id', Auth::id())->first();
        if ($event->capacity > 0) {


            if ($event->etat == 'Automatique') {
                Reservation::create([
                    'event_id' => $event->id,
                    'client_id' => $client->id,
                    'status' => 'Booked',
                ]);
                $event->capacity--;
                $event->save();

                return redirect()->back()->with('success', 'Votre réservation a été effectuée avec succès!');
            } elseif ($event->etat == 'Manuelle') {
                Reservation::create([
                    'event_id' => $event->id,
                    'client_id' => $client->id,
                    'status' => 'Available',
                ]);

                $event->capacity--;
                $event->save();
                return redirect()->back()->with('success', 'Votre réservation a été effectuée veuillez attendez la confirmation d\'organisateur ');

            }
        }
        else{
            return redirect()->back()->with('Error' , 'The Number Of Capacity Is Not Available');
        }
        return redirect()->back();

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
