<?php

namespace App\Http\Controllers;
use App\Models\CabinService;
use Illuminate\Http\Request;
use App\Http\Resources\CabinServiceCollection;

class CabinServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'name');
        $type = $request->input('type', 'asc');

        $validSort = ["cabins_id", "services_id"];
        if (!in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";
            return response()->json(['error' => $message], 400);
        }

        $validType = ["asc", "desc"];
        if (!in_array($type, $validType)) {
            $message = "Invalid sort type: $type";
            return response()->json(['error' => $message], 400);
        }

        $cabinServices = CabinService::orderBy($sort, $type)->get();
        return response()->json([new CabinServiceCollection($cabinServices)], 200);
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