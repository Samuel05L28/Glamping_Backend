<?php

namespace App\Http\Controllers;

use App\Models\CabinLevel;
use Illuminate\Http\Request;
use App\Http\Resources\CabinLevelCollection;

class CabinLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'name');
        $type = $request->input('type', 'asc');

        $validSort = ["name", "description"];
        if (!in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";
            return response()->json(['error' => $message], 400);
        }

        $validType = ["asc", "desc"];
        if (!in_array($type, $validType)) {
            $message = "Invalid sort type: $type";
            return response()->json(['error' => $message], 400);
        }

        $cabinLevels = CabinLevel::orderBy($sort, $type)->get();
        return response()->json([new CabinLevelCollection($cabinLevels)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cabinLevel = CabinLevel::create($request->all());
        return response()->json(['data' => $cabinLevel], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CabinLevel $cabinLevel)
    {
        return response()->json(['data' => $cabinLevel], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CabinLevel $cabinLevel)
    {
        $cabinLevel->update($request->all());
        return response()->json(['data' => $cabinLevel], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CabinLevel $cabinLevel)
    {
        $cabinLevel->delete();
        return response(null, 204);
    }
}
