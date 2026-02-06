# Clima - Prueba Técnica

Aplicación web para consultar el clima mediante la latitud y longuitud en tiempo real.

## Resumen de Implementación
- **Backend**: CRUD de ciudades con validación vía `FormRequests`.
- **API**: Integración con OpenWeatherMap a través de `OpenWeatherService`.
- **UX/UI**: Skeleton loader para estados de carga, animaciones fade-in y widget dinámico.
- **Base de Datos**: MySQL con migraciones y seeders de ciudades 5 principales de incluidos.

## Configuración (.env)
Indispensable agregar la API Key de OpenWeather:
```env
OPENWEATHERMAP_API_KEY=tu_api_key_aqui
```

## Instalación
1. `composer install && npm install`
2. `php artisan migrate --seed`
3. `php artisan serve`
4. `npm run dev` (para los assets)
