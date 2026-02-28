<?php

namespace App\Http\Controllers\Web;

use App\Jobs\AnalyzeJobOffer;
use App\Models\JobOffer;
use App\Services\JobApiService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobOfferController
{
    public function index(Request $request): View
    {
        $query = JobOffer::orderBy('created_at', 'desc');
        
        // Búsqueda por título o empresa
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('company', 'LIKE', "%{$search}%");
            });
        }
        
        $jobOffers = $query->get();
        
        return view('jobs.index', compact('jobOffers'));
    }
    
    public function fetchOffers(): RedirectResponse
    {
        try {
            $jobApiService = new JobApiService();
            $offers = $jobApiService->fetchJobOffers();
            
            $savedCount = 0;
            $skippedCount = 0;
            
            foreach ($offers as $offerData) {
                // Check if offer already exists by url_original
                $existingOffer = JobOffer::where('url_original', $offerData['url_original'])->first();
                
                if ($existingOffer) {
                    $skippedCount++;
                    continue;
                }
                
                // Create new job offer
                $jobOffer = JobOffer::create([
                    'title' => $offerData['title'],
                    'company' => $offerData['company'],
                    'location' => $offerData['location'],
                    'description' => $offerData['description'],
                    'url_original' => $offerData['url_original'],
                    'is_processed' => false
                ]);
                
                // Dispatch analysis job to queue
                AnalyzeJobOffer::dispatch($jobOffer->id);
                
                $savedCount++;
            }
            
            $message = "Se han guardado {$savedCount} nuevas ofertas";
            if ($skippedCount > 0) {
                $message .= " y se han omitido {$skippedCount} duplicados";
            }
            
            return redirect()->route('home')->with('success', $message);
            
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Error al cargar las ofertas: ' . $e->getMessage());
        }
    }
    
    public function destroy($id): RedirectResponse
    {
        try {
            $jobOffer = JobOffer::findOrFail($id);
            $jobOffer->delete();
            
            return redirect()->route('home')->with('success', 'Oferta eliminada correctamente');
            
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Error al eliminar la oferta: ' . $e->getMessage());
        }
    }
}
