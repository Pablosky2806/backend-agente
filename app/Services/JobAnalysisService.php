<?php

namespace App\Services;

class JobAnalysisService
{
    /**
     * Analiza una oferta de empleo usando IA simulada
     * para determinar si encaja con perfil Senior
     */
    public function analyzeJobOffer(string $title, string $description): array
    {
        // Simulación de análisis de IA con lógica avanzada
        $seniorKeywords = [
            'senior', 'lead', 'principal', 'staff', 'architect', 'head', 'director',
            '5+ years', '5+ años', 'más de 5', '5+ años de experiencia',
            'experienced', 'avanzado', 'expert', 'especialista', 'técnico senior'
        ];
        
        $techKeywords = [
            'aws', 'kubernetes', 'docker', 'microservices', 'cloud', 'devops',
            'architecture', 'scalability', 'performance', 'optimization',
            'leadership', 'mentoring', 'team lead', 'coordinador'
        ];
        
        $titleLower = strtolower($title);
        $descriptionLower = strtolower($description);
        
        // Análisis de nivel senior
        $seniorScore = 0;
        foreach ($seniorKeywords as $keyword) {
            if (strpos($descriptionLower, $keyword) !== false) {
                $seniorScore += 20;
            }
        }
        
        // Análisis de tecnologías avanzadas
        $techScore = 0;
        foreach ($techKeywords as $keyword) {
            if (strpos($descriptionLower, $keyword) !== false) {
                $techScore += 15;
            }
        }
        
        // Bono por palabras clave en título
        if (strpos($titleLower, 'senior') !== false) $seniorScore += 30;
        if (strpos($titleLower, 'lead') !== false) $seniorScore += 25;
        if (strpos($titleLower, 'architect') !== false) $seniorScore += 35;
        
        // Cálculo final
        $totalScore = $seniorScore + $techScore;
        $isSenior = $totalScore >= 40;
        
        // Generar análisis basado en el resultado
        $analysis = $this->generateAnalysisText($title, $description, $isSenior, $totalScore);
        
        return [
            'is_senior' => $isSenior,
            'score' => $totalScore,
            'analysis' => $analysis,
            'senior_keywords_found' => $this->findKeywords($descriptionLower, $seniorKeywords),
            'tech_keywords_found' => $this->findKeywords($descriptionLower, $techKeywords)
        ];
    }
    
    private function generateAnalysisText(string $title, string $description, bool $isSenior, int $score): string
    {
        if ($isSenior) {
            if ($score >= 70) {
                return "Este puesto está claramente orientado a un perfil Senior/Expert. Se requieren responsabilidades de liderazgo, arquitectura o experiencia avanzada en tecnologías específicas. Ideal para candidatos con más de 5 años de experiencia demostrable.";
            } elseif ($score >= 50) {
                return "Posición de nivel Senior con requisitos sólidos de experiencia y conocimientos técnicos avanzados. Se valora experiencia previa en el dominio y capacidad de mentoría.";
            } else {
                return "Posición que podría encajar con perfil Senior aunque los requisitos no son explícitamente avanzados. Requiere evaluación adicional de responsabilidades.";
            }
        } else {
            return "Este puesto parece orientado a perfiles Junior/Mid-level. No se detectan requisitos claros de experiencia senior o responsabilidades de liderazgo/arquitectura.";
        }
    }
    
    private function findKeywords(string $text, array $keywords): array
    {
        $found = [];
        foreach ($keywords as $keyword) {
            if (strpos($text, $keyword) !== false) {
                $found[] = $keyword;
            }
        }
        return $found;
    }
}
