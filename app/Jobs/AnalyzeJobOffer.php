<?php

namespace App\Jobs;

use App\Models\JobOffer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AnalyzeJobOffer implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private int $jobOfferId
    ) {
    }

    public function handle(): void
    {
        // Simular carga de trabajo
        sleep(2);
        
        $jobOffer = JobOffer::find($this->jobOfferId);
        
        if (!$jobOffer) {
            return;
        }
        
        // Analizar si la descripción contiene 'Remoto'
        if (stripos($jobOffer->description, 'Remoto') !== false) {
            $jobOffer->is_processed = true;
            $jobOffer->save();
            
            echo "Job Offer {$jobOffer->title} marcada como procesada (contiene 'Remoto')\n";
        } else {
            echo "Job Offer {$jobOffer->title} analizada (no contiene 'Remoto')\n";
        }
    }
}
