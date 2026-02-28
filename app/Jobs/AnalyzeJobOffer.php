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
        
        $isPriority = false;
        $keywords = ['AWS', 'Kubernetes'];
        
        // Analizar palabras clave en la descripción
        foreach ($keywords as $keyword) {
            if (stripos($jobOffer->description, $keyword) !== false) {
                $isPriority = true;
                echo "Job Offer {$jobOffer->title} marcada como PRIORITARIA (contiene '{$keyword}')\n";
                break;
            }
        }
        
        // Analizar si la descripción contiene 'Remoto'
        if (stripos($jobOffer->description, 'Remoto') !== false) {
            $jobOffer->is_processed = true;
            $jobOffer->save();
            
            $priorityText = $isPriority ? ' PRIORITARIA' : '';
            echo "Job Offer {$jobOffer->title}{$priorityText} marcada como procesada (contiene 'Remoto')\n";
        } else {
            $priorityText = $isPriority ? ' PRIORITARIA' : '';
            echo "Job Offer {$jobOffer->title}{$priorityText} analizada (no contiene 'Remoto')\n";
        }
    }
}
