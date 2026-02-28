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
        $templates = [
            [
                'title' => 'Laravel Developer',
                'company' => 'Tech Solutions Inc.',
                'location' => 'Madrid, Spain',
                'description' => 'Buscamos un desarrollador Laravel con experiencia en PHP, MySQL y APIs REST. Conocimientos en Vue.js es un plus. Ofrecemos trabajo Remoto con flexibilidad horaria.',
            ],
            [
                'title' => 'Backend Engineer',
                'company' => 'Digital Innovations',
                'location' => 'Barcelona, Spain',
                'description' => 'Ingeniero Backend para trabajar con Node.js, Python y microservicios. Experiencia con Docker requerida.',
            ],
            [
                'title' => 'Full Stack Developer',
                'company' => 'StartupHub',
                'location' => 'Valencia, Spain',
                'description' => 'Desarrollador Full Stack con experiencia en React y Node.js. Oportunidad de crecimiento en empresa en expansión.',
            ],
            [
                'title' => 'PHP Developer',
                'company' => 'Web Agency Pro',
                'location' => 'Sevilla, Spain',
                'description' => 'Desarrollador PHP con experiencia en Symfony y Laravel. Proyectos interesantes para clientes internacionales.',
            ],
            [
                'title' => 'DevOps Engineer',
                'company' => 'Cloud Systems',
                'location' => 'Bilbao, Spain',
                'description' => 'Ingeniero DevOps con experiencia en AWS, Kubernetes y CI/CD. Certificaciones en nube son valoradas. Trabajo Remoto disponible.',
            ]
        ];

        // Seleccionar 3 ofertas aleatorias y generar URLs únicas
        $randomKeys = array_rand($templates, 3);
        $offers = [];

        foreach ($randomKeys as $key) {
            $template = $templates[$key];
            $offers[] = [
                'title' => $template['title'],
                'company' => $template['company'],
                'location' => $template['location'],
                'description' => $template['description'],
                'url_original' => 'https://example.com/jobs/' . str_replace(' ', '-', strtolower($template['title'])) . '-' . uniqid()
            ];
        }

        return $offers;
    }
}
