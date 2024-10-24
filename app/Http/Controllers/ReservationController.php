<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Reservation = Reservation::all();
         return response()->json(['data' => $Reservation], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Reservation = Reservation::create($request->all());
        return response()->json(['data' => $Reservation], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $Reservation)
    {
        return response()->json(['data' => $Reservation], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $Reservation)
    {
        $Reservation->update($request->all());
         return response()->json(['data' => $Reservation], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $Reservation)
    {
        $Reservation->delete();
         return response(null, 204);
    }
}

