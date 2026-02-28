<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $jobOffers = JobOffer::orderBy('created_at', 'desc')->get();
        return response()->json($jobOffers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'url_original' => 'required|url',
            'is_processed' => 'boolean'
        ]);

        $jobOffer = JobOffer::create($validated);
        return response()->json($jobOffer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $jobOffer = JobOffer::findOrFail($id);
        return response()->json($jobOffer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $jobOffer = JobOffer::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'company' => 'sometimes|string|max:255',
            'location' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'url_original' => 'sometimes|url',
            'is_processed' => 'sometimes|boolean'
        ]);

        $jobOffer->update($validated);
        return response()->json($jobOffer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $jobOffer = JobOffer::findOrFail($id);
        $jobOffer->delete();
        return response()->json(null, 204);
    }
}
