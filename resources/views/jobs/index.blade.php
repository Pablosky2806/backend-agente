<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Job Agent - Sistema Inteligente de Empleos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .ideal-glow {
            box-shadow: 0 0 20px rgba(251, 191, 36, 0.3);
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(251, 191, 36, 0.3); }
            50% { box-shadow: 0 0 30px rgba(251, 191, 36, 0.5); }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation Header -->
    <nav class="gradient-bg shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 100 4h2a2 2 0 100-4h2a2 2 0 100 4h2a2 2 0 100-4H8a2 2 0 012-2z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h1 class="text-white text-xl font-bold">Backend Job Agent</h1>
                        <p class="text-purple-100 text-xs">Sistema Inteligente de Empleos</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="/" class="text-white hover:text-purple-200 transition-colors">Inicio</a>
                    <a href="/api/job-offers" class="text-white hover:text-purple-200 transition-colors">API</a>
                    <div class="flex items-center space-x-2 bg-white/20 rounded-lg px-3 py-2">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white text-sm">Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="gradient-bg rounded-2xl p-8 mb-8 text-white">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-bold mb-4 flex items-center gap-3">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 100 4h2a2 2 0 100-4h2a2 2 0 100 4h2a2 2 0 100-4H8a2 2 0 012-2z" clip-rule="evenodd"/>
                    </svg>
                    Agente de Empleos
                </h1>
                <p class="text-xl text-purple-100 mb-6">
                    Sistema inteligente que captura, procesa y analiza ofertas de empleo para encontrar el candidato ideal
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center gap-2 bg-white/20 rounded-lg px-4 py-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Procesamiento Automático</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 rounded-lg px-4 py-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 100 4h2a2 2 0 100-4h2a2 2 0 100 4h2a2 2 0 100-4H8a2 2 0 012-2z" clip-rule="evenodd"/>
                        </svg>
                        <span>Análisis con IA</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 rounded-lg px-4 py-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span>Detección de Candidatos Ideales</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div class="flex-1">{{ session('success') }}</div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <div class="flex-1">{{ session('error') }}</div>
            </div>
        @endif

        <!-- Actions Bar -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-gray-100">
            <div class="flex flex-col lg:flex-row gap-4 items-center">
                <!-- Search -->
                <form method="GET" action="/" class="flex-1">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request()->get('search') }}" 
                               placeholder="🔍 Buscar por título o empresa..." 
                               class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-700 placeholder-gray-400">
                        <svg class="absolute left-4 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </form>
                
                <!-- Fetch Button -->
                <form method="POST" action="/fetch-offers">
                    @csrf
                    <button type="submit" 
                            class="gradient-bg hover:opacity-90 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 flex items-center gap-2 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Actualizar Ofertas
                    </button>
                </form>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 100 4h2a2 2 0 100-4h2a2 2 0 100 4h2a2 2 0 100-4H8a2 2 0 012-2z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-3xl font-bold text-blue-600">{{ $jobOffers->count() }}</span>
                </div>
                <div class="text-gray-600 font-medium">Total de Ofertas</div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-3xl font-bold text-green-600">{{ $jobOffers->where('is_processed', true)->count() }}</span>
                </div>
                <div class="text-gray-600 font-medium">Ofertas Analizadas</div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <svg class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-3xl font-bold text-gray-600">{{ $jobOffers->where('is_processed', false)->count() }}</span>
                </div>
                <div class="text-gray-600 font-medium">Ofertas Pendientes</div>
            </div>
            <div class="bg-gradient-to-br from-yellow-50 to-orange-50 border-2 border-yellow-300 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow ideal-glow">
                <div class="flex items-center justify-between mb-2">
                    <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-3xl font-bold text-yellow-700">{{ $jobOffers->where('ai_analysis', '¡Candidato Ideal!')->count() }}</span>
                </div>
                <div class="text-yellow-700 font-semibold">⭐ Ofertas Ideales</div>
            </div>
        </div>

        <!-- Job Offers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($jobOffers as $job)
                <div class="bg-white rounded-xl shadow-lg card-hover border border-gray-100
                    @if($job->ai_analysis === '¡Candidato Ideal!')
                        border-2 border-yellow-400 ideal-glow
                    @endif">
                    <div class="p-6">
                        <!-- Title and Badge -->
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-gray-800 flex-1 
                                @if($job->ai_analysis === '¡Candidato Ideal!')
                                    text-yellow-700
                                @endif">{{ $job->title }}</h3>
                            <div class="flex flex-col gap-2">
                                @if($job->ai_analysis === '¡Candidato Ideal!')
                                    <span class="px-3 py-1 text-xs font-bold text-yellow-800 bg-gradient-to-r from-yellow-200 to-orange-200 rounded-full flex items-center gap-1 shadow-sm">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        ⭐ Candidato Ideal
                                    </span>
                                @endif
                                @if ($job->is_processed)
                                    <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                        ✅ Analizado
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">
                                        ⏳ Pendiente
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- AI Analysis Note -->
                        @if($job->ai_analysis)
                            <div class="mb-4 p-3 bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl">
                                <div class="flex items-start gap-3">
                                    <div class="bg-yellow-200 rounded-lg p-2 mt-1">
                                        <svg class="w-5 h-5 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.707-.707M12 3a9 9 0 11-8.464 5.95"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="text-sm font-bold text-yellow-800 mb-1">🤖 Análisis del Agente</div>
                                        <p class="text-sm text-yellow-700 leading-relaxed">{{ $job->ai_analysis }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Company and Location -->
                        <div class="mb-4 space-y-2">
                            <div class="flex items-center text-gray-600">
                                <div class="bg-blue-100 rounded-lg p-2 mr-3">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">{{ $job->company }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <div class="bg-green-100 rounded-lg p-2 mr-3">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">{{ $job->location }}</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <p class="text-gray-700 text-sm line-clamp-3">{{ Str::limit($job->description, 150) }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <a href="{{ $job->url_original }}" target="_blank" 
                               class="inline-flex items-center gap-2 text-purple-600 hover:text-purple-800 font-medium text-sm bg-purple-50 px-3 py-2 rounded-lg hover:bg-purple-100 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Ver Oferta
                            </a>
                            <div class="flex items-center gap-3">
                                <span class="text-xs text-gray-500">{{ $job->created_at->diffForHumans() }}</span>
                                <form method="POST" action="/job-offers/{{ $job->id }}" onsubmit="return confirm('¿Eliminar esta oferta?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm inline-flex items-center gap-1 hover:bg-red-50 px-2 py-1 rounded transition-colors">
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
                    <div class="bg-white rounded-xl shadow-lg p-12 text-center border border-gray-100">
                        <div class="bg-gradient-to-br from-purple-100 to-blue-100 rounded-full p-6 w-24 h-24 mx-auto mb-6">
                            <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">🔍 No hay ofertas disponibles</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">El agente no ha capturado ninguna oferta todavía. Pulsa "Actualizar Ofertas" para comenzar a buscar oportunidades.</p>
                        <form method="POST" action="/fetch-offers" class="inline-block">
                            @csrf
                            <button type="submit" class="gradient-bg hover:opacity-90 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 flex items-center gap-2 shadow-lg hover:shadow-xl transform hover:scale-105 mx-auto">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Capturar Primeras Ofertas
                            </button>
                        </form>
                    </div>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <footer class="gradient-bg text-white mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 100 4h2a2 2 0 100-4h2a2 2 0 100 4h2a2 2 0 100-4H8a2 2 0 012-2z" clip-rule="evenodd"/>
                        </svg>
                        <h3 class="text-xl font-bold">Backend Job Agent</h3>
                    </div>
                    <p class="text-purple-100 text-sm">Sistema inteligente de análisis de ofertas de empleo</p>
                </div>
                <div class="flex flex-col md:flex-row gap-6 text-sm">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Procesamiento Automático</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span>Detección de Candidatos Ideales</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 7H7v6h6V7z"/>
                            <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2z" clip-rule="evenodd"/>
                        </svg>
                        <span>Análisis con IA</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-purple-400 mt-6 pt-6 text-center text-purple-100 text-sm">
                <p>© 2026 Backend Job Agent. Desarrollado con ❤️ usando Laravel 11 y Tailwind CSS</p>
            </div>
        </div>
    </footer>
</body>
</html>
