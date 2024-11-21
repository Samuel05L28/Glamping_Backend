<?php

namespace App\Http\Controllers;

use App\Http\Resources\CabinCollection;
use App\Http\Resources\CabinResource;
use App\Models\Cabin;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\CabinStoreRequest;
use App\Http\Requests\CabinUpdateRequest;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'name');
        $type = $request->input('type', 'asc');

        $validSort = ["name", "cabinlevels_id", "capacity"];

        if (!in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";
            return response()->json(['error' => $message], 400);
        }

        $validType = ["asc", "desc"];

        if (!in_array($type, $validType)) {
            $message = "Invalid sort field: $type";
            return response()->json(['error' => $message], 400);
        }


        $cabin = Cabin::orderBy($sort, $type)->get();

        return response()->json([new CabinCollection($cabin)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CabinStoreRequest $request)
    {
        $validated = $request->validate((new CabinStoreRequest)->rules());
        $cabin = Cabin::create($validated);

        return response()->json(['data' => $cabin], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabin $cabin)
    {
        return response()->json(['data' => new CabinResource($cabin)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabin $cabin)
    {

        $validated = $request->validate((new CabinUpdateRequest)->rules());
        $cabin->update($validated);
        return response()->json(['data' => $cabin], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabin $cabin)
    {
        $cabin->delete();

        return response(null, 204);
    }

}
