<?php

namespace App\Http\Controllers;
use App\Models\CabinService;
use Illuminate\Http\Request;

class CabinServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $CabinService = CabinService::all();
         return response()->json(['data' => $CabinService], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $CabinService = CabinService::create($request->all());
        return response()->json(['data' => $CabinService], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CabinService $CabinService)
    {
        return response()->json(['data' => $CabinService], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CabinService $CabinService)
    {
        $CabinService->update($request->all());
         return response()->json(['data' => $CabinService], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CabinService $CabinService)
    {
        $CabinService->delete();
         return response(null, 204);
    }
}

