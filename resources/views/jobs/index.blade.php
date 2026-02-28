<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Offers - Agente de Empleos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Agente de Empleos</h1>
            <p class="text-gray-600">Ofertas de empleo capturadas y analizadas automáticamente</p>
        </header>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-2xl font-bold text-blue-600">{{ $jobOffers->count() }}</div>
                <div class="text-gray-600">Total de ofertas</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-2xl font-bold text-green-600">{{ $jobOffers->where('is_processed', true)->count() }}</div>
                <div class="text-gray-600">Analizadas</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-2xl font-bold text-gray-600">{{ $jobOffers->where('is_processed', false)->count() }}</div>
                <div class="text-gray-600">Pendientes</div>
            </div>
        </div>

        <!-- Job Offers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($jobOffers as $job)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <!-- Title and Badge -->
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 flex-1">{{ $job->title }}</h3>
                            @if ($job->is_processed)
                                <span class="ml-2 px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                    Analizado
                                </span>
                            @else
                                <span class="ml-2 px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">
                                    Pendiente
                                </span>
                            @endif
                        </div>

                        <!-- Company and Location -->
                        <div class="mb-4">
                            <div class="flex items-center text-gray-600 mb-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                {{ $job->company }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $job->location }}
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <p class="text-gray-700 text-sm line-clamp-3">{{ Str::limit($job->description, 150) }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-between items-center">
                            <a href="{{ $job->url_original }}" target="_blank" 
                               class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                                Ver oferta original
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                            <div class="text-xs text-gray-500">
                                {{ $job->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-lg shadow p-8 text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">No hay ofertas disponibles</h3>
                        <p class="text-gray-600 mb-4">Ejecuta el comando <code class="bg-gray-100 px-2 py-1 rounded">php artisan jobs:fetch</code> para capturar nuevas ofertas</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
