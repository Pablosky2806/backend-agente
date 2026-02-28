<?php

namespace App\Services;

class JobApiService
{
    /**
     * Simula una llamada a una API externa y devuelve ofertas de empleo
     *
     * @return array
     */
    public function fetchJobOffers(): array
    {
        // Simulación de respuesta de API externa
        return [
            [
                'title' => 'Laravel Developer',
                'company' => 'Tech Solutions Inc.',
                'location' => 'Madrid, Spain',
                'description' => 'Buscamos un desarrollador Laravel con experiencia en PHP, MySQL y APIs REST. Conocimientos en Vue.js es un plus. Ofrecemos trabajo Remoto con flexibilidad horaria.',
                'url_original' => 'https://example.com/jobs/laravel-developer-1'
            ],
            [
                'title' => 'Backend Engineer',
                'company' => 'Digital Innovations',
                'location' => 'Barcelona, Spain',
                'description' => 'Ingeniero Backend para trabajar con Node.js, Python y microservicios. Experiencia con Docker requerida.',
                'url_original' => 'https://example.com/jobs/backend-engineer-2'
            ],
            [
                'title' => 'Full Stack Developer',
                'company' => 'StartupHub',
                'location' => 'Valencia, Spain',
                'description' => 'Desarrollador Full Stack con experiencia en React y Node.js. Oportunidad de crecimiento en empresa en expansión.',
                'url_original' => 'https://example.com/jobs/fullstack-developer-3'
            ],
            [
                'title' => 'PHP Developer',
                'company' => 'Web Agency Pro',
                'location' => 'Sevilla, Spain',
                'description' => 'Desarrollador PHP con experiencia en Symfony y Laravel. Proyectos interesantes para clientes internacionales.',
                'url_original' => 'https://example.com/jobs/php-developer-4'
            ],
            [
                'title' => 'DevOps Engineer',
                'company' => 'Cloud Systems',
                'location' => 'Bilbao, Spain',
                'description' => 'Ingeniero DevOps con experiencia en AWS, Kubernetes y CI/CD. Certificaciones en nube son valoradas.',
                'url_original' => 'https://example.com/jobs/devops-engineer-5'
            ]
        ];
    }
}
