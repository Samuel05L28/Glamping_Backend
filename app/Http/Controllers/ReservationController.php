<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Resources\ReservationCollection;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'cabins_id');
        $type = $request->input('type', 'asc');

        $validSort = ["cabins_id", "users_id"];
        if (!in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";
            return response()->json(['error' => $message], 400);
        }

        $validType = ["asc", "desc"];
        if (!in_array($type, $validType)) {
            $message = "Invalid sort type: $type";
            return response()->json(['error' => $message], 400);
        }

        $reservations = Reservation::orderBy($sort, $type)->get();
        return response()->json([new ReservationCollection($reservations)], 200);
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

