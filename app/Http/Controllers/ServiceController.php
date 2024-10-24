<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Service = Service::all();
         return response()->json(['data' => $Service], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Service = Service::create($request->all());
        return response()->json(['data' => $Service], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $Service)
    {
        return response()->json(['data' => $Service], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $Service)
    {
        $Service->update($request->all());
        return response()->json(['data' => $Service], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $Service)
    {
        $Service->delete();
        return response(null, 204);
    }
}

