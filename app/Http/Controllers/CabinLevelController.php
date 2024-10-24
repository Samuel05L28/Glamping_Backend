<?php

namespace App\Http\Controllers;
use App\Models\CabinLevel;
use Illuminate\Http\Request;

class CabinLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $CabinLevel = CabinLevel::all();
         return response()->json(['data' => $CabinLevel], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $CabinLevel = CabinLevel::create($request->all());
        return response()->json(['data' => $CabinLevel], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CabinLevel $CabinLevel)
    {
        return response()->json(['data' => $CabinLevel], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CabinLevel $CabinLevel)
    {
        $CabinLevel->update($request->all());
         return response()->json(['data' => $CabinLevel], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CabinLevel $CabinLevel)
    {
        $CabinLevel->delete();
         return response(null, 204);
    }
}
