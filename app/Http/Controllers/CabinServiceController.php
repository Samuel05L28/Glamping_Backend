<?php

namespace App\Http\Controllers;
use App\Models\CabinService;
use Illuminate\Http\Request;
use App\Http\Resources\CabinServiceCollection;
use App\Http\Requests\CabinServiceUpdateRequest;
use App\Http\Requests\CabinServiceStoreRequest;

class CabinServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'cabins_id');
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
        $validated = $request->validate((new CabinServiceStoreRequest)->rules());
        $CabinService = CabinService::create($validated);
        return response()->json(['data' => $CabinService], 200);
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
        $validated = $request->validate((new CabinServiceUpdateRequest)->rules());
        $CabinService->update($validated);
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