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

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Actions Bar -->
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <div class="flex flex-col md:flex-row gap-4 items-center">
                <!-- Search -->
                <form method="GET" action="/" class="flex-1">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request()->get('search') }}" 
                               placeholder="Buscar por título o empresa..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </form>
                
                <!-- Fetch Button -->
                <form method="POST" action="/fetch-offers">
                    @csrf
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Actualizar Ofertas
                    </button>
                </form>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
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
            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg shadow p-6">
                <div class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <div>
                        <div class="text-2xl font-bold text-yellow-700">{{ $jobOffers->where('ai_analysis', '¡Candidato Ideal!')->count() }}</div>
                        <div class="text-yellow-700 font-medium">Ofertas Ideales</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Offers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($jobOffers as $job)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 
                    @if($job->ai_analysis === '¡Candidato Ideal!')
                        border-2 border-yellow-400 shadow-yellow-200 hover:shadow-yellow-300 transform hover:scale-105
                    @endif">
                    <div class="p-6">
                        <!-- Title and Badge -->
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 flex-1 
                                @if($job->ai_analysis === '¡Candidato Ideal!')
                                    text-yellow-700
                                @endif">{{ $job->title }}</h3>
                            <div class="flex items-center gap-2">
                                @if($job->ai_analysis === '¡Candidato Ideal!')
                                    <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        Ideal
                                    </span>
                                @endif
                                @if ($job->is_processed)
                                    <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                        Analizado
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">
                                        Pendiente
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- AI Analysis Note -->
                        @if($job->ai_analysis)
                            <div class="mb-3 p-2 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.707-.707M12 3a9 9 0 11-8.464 5.95"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-yellow-800">Nota del agente: {{ $job->ai_analysis }}</span>
                                </div>
                            </div>
                        @endif

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

                        <!-- AI Analysis -->
                        @if($job->ai_analysis)
                            <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.707-.707M12 3a9 9 0 11-8.464 5.95"></path>
                                    </svg>
                                    <div class="flex-1">
                                        <div class="text-sm font-semibold text-blue-800 mb-1">Análisis de IA</div>
                                        <p class="text-xs text-blue-700">{{ Str::limit($job->ai_analysis, 200) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="flex justify-between items-center">
                            <a href="{{ $job->url_original }}" target="_blank" 
                               class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                                Ver oferta original
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                            <div class="flex items-center gap-2">
                                <div class="text-xs text-gray-500">
                                    {{ $job->created_at->diffForHumans() }}
                                </div>
                                <form method="POST" action="/job-offers/{{ $job->id }}" onsubmit="return confirm('¿Estás seguro de eliminar esta oferta?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 text-sm font-medium inline-flex items-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Eliminar
                                    </button>
                                </form>
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
