<?php

namespace App\Jobs;

use App\Models\JobOffer;
use App\Notifications\IdealJobFound;
use App\Services\JobAnalysisService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

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
        
        // Generar conclusión basada en palabras clave
        $conclusion = $this->generateConclusion($jobOffer->title, $jobOffer->description);
        
        // Guardar conclusión en la base de datos
        $jobOffer->ai_analysis = $conclusion;
        $jobOffer->is_processed = true;
        $jobOffer->save();
        
        // Enviar notificación si es candidato ideal
        if ($conclusion === '¡Candidato Ideal!') {
            Log::info("¡OFERTA IDEAL ENCONTRADA: {$jobOffer->title} en {$jobOffer->company}");
            
            // Enviar notificación (por ahora al log)
            Log::notice("🎯 Candidato Ideal Detectado: {$jobOffer->title} - {$jobOffer->company} ({$jobOffer->location})");
            
            // Aquí podríamos enviar a un usuario real:
            // $user = User::first();
            // $user->notify(new IdealJobFound($jobOffer->title, $jobOffer->company, $jobOffer->location));
        }
        
        // Mostrar resultados en consola
        echo "Job Offer {$jobOffer->title} - Conclusión: {$conclusion}\n";
    }
    
    private function generateConclusion(string $title, string $description): string
    {
        $titleLower = strtolower($title);
        $descriptionLower = strtolower($description);
        
        // Análisis de Laravel + Remoto
        if (strpos($titleLower, 'laravel') !== false && strpos($descriptionLower, 'remoto') !== false) {
            return '¡Candidato Ideal!';
        }
        
        // Análisis de experiencia requerida
        if (strpos($descriptionLower, '+5 años') !== false || 
            strpos($descriptionLower, '5+ años') !== false ||
            strpos($descriptionLower, 'más de 5 años') !== false ||
            strpos($descriptionLower, '5+ years') !== false) {
            return 'Requiere mucha experiencia';
        }
        
        // Análisis de tecnologías específicas
        if (strpos($descriptionLower, 'aws') !== false || 
            strpos($descriptionLower, 'kubernetes') !== false ||
            strpos($descriptionLower, 'docker') !== false) {
            return 'Tecnologías avanzadas requeridas';
        }
        
        // Análisis de nivel senior
        if (strpos($titleLower, 'senior') !== false || 
            strpos($titleLower, 'lead') !== false ||
            strpos($titleLower, 'architect') !== false) {
            return 'Posición de nivel senior';
        }
        
        // Análisis de trabajo remoto
        if (strpos($descriptionLower, 'remoto') !== false || 
            strpos($descriptionLower, 'remote') !== false) {
            return 'Trabajo remoto disponible';
        }
        
        // Análisis de frameworks populares
        if (strpos($titleLower, 'react') !== false || 
            strpos($titleLower, 'vue') !== false ||
            strpos($titleLower, 'angular') !== false) {
            return 'Frontend moderno requerido';
        }
        
        return 'Posición estándar';
    }
}
