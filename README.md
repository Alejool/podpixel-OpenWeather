


# OpenWeather Project

Aplicación web para consultar el clima de ciudades usando la API de OpenWeatherMap.

## Arquitectura
Se usar un enfoque sencillo y se manejara la api como servicio llamado OpenWeatherService y su necesario configuracion en services.php consumiendo de .env
- **Servicio (`OpenWeatherService`)**: Encargado de consumir la API externa.
- **Controlador**: Conectarse con el servicio y retornar a las vistas.
- **Base de Datos**: MySQL.
- **Frontend**: TailwindCSS + Blade.

## Tareas Siguientes
- [ ] Implementar llamada a la API  `getWeatherData` con latitud/longitud.
- [ ] Vista: Formulario de registro de ciudades.
- [ ] Vista: Listado de ciudades + Widget del clima. 


    
****
