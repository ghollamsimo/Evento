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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ReservationRequest $request, $eventId)
    {
        $validatedData = $request->validated();

        $client = Client::where('user_id' ,  Auth::id())->first(); // Get authenticated user's ID

        // Ensure that the authenticated user is a client
        // Optionally, you can add additional checks here if needed

        // Create reservation
        Reservation::create([
            'event_id' => $eventId,
            'client_id' => $client->id,
            'status' => $validatedData['status'] , // Set default if 'status' is not provided
        ]);

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
