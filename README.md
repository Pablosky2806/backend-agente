# Backend Job Agent - Laravel

Un agente inteligente que captura ofertas de empleo, las procesa en segundo plano usando colas (Queues) y las analiza para encontrar el 'Candidato Ideal'.

## 🚀 Tecnologías

- **PHP 8.2+**
- **Laravel 11**
- **Tailwind CSS**
- **SQLite**
- **Workers/Queues**
- **Blade Templates**

## 📋 Instalación

Sigue estos pasos para poner en marcha el agente:

### 1. Clonar el repositorio
```bash
git clone <repository-url>
cd backend-agente
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar entorno
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Ejecutar migraciones
```bash
php artisan migrate
```

### 5. Iniciar servidor web
```bash
php artisan serve
```

### 6. Activar procesador de colas (¡MUY IMPORTANTE!)
```bash
# En una terminal separada
php artisan queue:work
```

> **Nota**: El sistema de colas es fundamental para el análisis asíncrono de ofertas. Sin `queue:work` activo, las ofertas se guardarán pero no se analizarán.

## 🎯 Funcionalidades

### ✅ Captura Automática
- Botón "Actualizar Ofertas" para capturar nuevas ofertas
- Detección automática de duplicados por URL
- Integración con servicio simulado de API externa

### ⚡ Procesamiento Asíncrono
- Sistema de colas para análisis en segundo plano
- Procesamiento no bloqueante de la interfaz
- Workers independientes para análisis de IA

### 🧠 Análisis Inteligente
- Detección de perfiles Senior basada en palabras clave
- Identificación de tecnologías avanzadas (AWS, Kubernetes, Docker)
- Análisis de requisitos de experiencia
- Generación de conclusiones personalizadas

### 🔍 Buscador Avanzado
- Búsqueda en tiempo real por título o empresa
- Filtrado instantáneo sin recargar página
- Conservación de términos de búsqueda

### ⭐ Resaltado de Ofertas Ideales
- Detección automática de "Candidato Ideal" (Laravel + Remoto)
- Resaltado visual con bordes dorados y animaciones
- Contador en tiempo real de ofertas perfectas
- Sistema de notificaciones para ofertas ideales

### 🗑️ Gestión Completa
- Eliminación individual de ofertas con confirmación
- Estadísticas en tiempo real (Total, Analizadas, Pendientes, Ideales)
- Flash messages para feedback de acciones

## 🏗️ Arquitectura del Sistema

### Modelo de Datos
- **JobOffer**: Modelo principal con campos para título, empresa, ubicación, descripción, URL original, estado de procesamiento y análisis de IA

### Servicios
- **JobApiService**: Simula llamadas a API externas
- **JobAnalysisService**: Motor de análisis inteligente

### Jobs (Colas)
- **AnalyzeJobOffer**: Procesa ofertas en segundo plano y genera conclusiones

### Notificaciones
- **IdealJobFound**: Sistema de notificaciones para ofertas perfectas

### Controladores
- **Web/JobOfferController**: Gestión de vistas y acciones web
- **Api/JobOfferController**: Endpoints API para gestión programática

## 🎨 Interfaz de Usuario

- **Diseño Responsive**: Adaptado para móviles y escritorio
- **Tailwind CSS**: Estilos modernos y consistentes
- **Tarjetas Interactivas**: Hover effects y animaciones suaves
- **Badges de Estado**: Visualización clara del estado de cada oferta
- **Notas del Agente**: Conclusiones de IA destacadas

## 🔧 Comandos Útiles

### Capturar ofertas manualmente
```bash
php artisan jobs:fetch
```

### Ver estado de las colas
```bash
php artisan queue:failed
php artisan queue:retry all
```

### Limpiar caché
```bash
php artisan cache:clear
php artisan config:clear
```

## 📊 Estadísticas en Tiempo Real

La interfaz muestra cuatro métricas principales:
- **Total de ofertas**: Todas las ofertas capturadas
- **Analizadas**: Ofertas procesadas por la IA
- **Pendientes**: Ofertas esperando procesamiento
- **Ofertas Ideales**: Candidatos perfectos detectados

## 🔄 Flujo de Trabajo

1. **Captura**: El usuario pulsa "Actualizar Ofertas" o ejecuta el comando
2. **Almacenamiento**: Las ofertas se guardan en la base de datos
3. **Encolado**: Cada oferta nueva se envía a la cola de análisis
4. **Procesamiento**: El worker analiza la oferta en segundo plano
5. **Análisis**: La IA genera conclusiones basadas en palabras clave
6. **Notificación**: Si es ideal, se registra una notificación
7. **Visualización**: La interfaz se actualiza con los resultados

## 🛡️ Seguridad

- Archivo `.env` incluido en `.gitignore`
- Validación de datos en todos los formularios
- Protección CSRF en todas las rutas web
- Sanitización de entradas de usuario

## 📝 Notas de Desarrollo

- El sistema usa SQLite para desarrollo rápido
- Las colas usan driver de base de datos
- El análisis de IA es simulado pero extensible
- La interfaz está optimizada para UX

## 🤝 Contribuir

1. Fork del proyecto
2. Crear feature branch
3. Commit de cambios
4. Push al branch
5. Pull Request

## 📄 Licencia

Este proyecto está bajo licencia MIT.

---

**Desarrollado con ❤️ usando Laravel 11**
