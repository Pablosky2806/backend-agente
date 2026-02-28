<?php

namespace App\Jobs;

use App\Models\JobOffer;
use App\Services\JobAnalysisService;
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
        
        // Usar servicio de IA para análisis
        $analysisService = new JobAnalysisService();
        $analysis = $analysisService->analyzeJobOffer($jobOffer->title, $jobOffer->description);
        
        // Guardar análisis en la base de datos
        $jobOffer->ai_analysis = $analysis['analysis'];
        $jobOffer->is_processed = true;
        $jobOffer->save();
        
        // Mostrar resultados en consola
        $seniorText = $analysis['is_senior'] ? 'PERFIL SENIOR' : 'Perfil Junior/Mid';
        $scoreText = "(Score: {$analysis['score']})";
        
        echo "Job Offer {$jobOffer->title} - {$seniorText} {$scoreText}\n";
        echo "Análisis: {$analysis['analysis']}\n\n";
    }
}
