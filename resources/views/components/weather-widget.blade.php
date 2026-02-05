<div id="welcome-message" class="h-[700px] md:max-w-[700px] flex flex-col items-center justify-center text-center p-12 bg-white rounded-lg shadow-sm border border-gray-100 min-h-[400px]">
    <svg class="w-16 h-16 text-orange-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
    </svg>
    <h3 class="text-lg font-medium text-gray-900">Selecciona una ciudad</h3>
    <p class="text-gray-500">Haz clic en una ciudad de la lista para ver su pronóstico del tiempo.</p>
</div>

<div id="weather-widget" class="hidden min-h-full  bg-orange-400 rounded-lg shadow-xl text-white p-8 relative overflow-hidden ">
    <div class="absolute top-0 right-0 -mr-24 -mt-24 w-64 h-64 rounded-full bg-white opacity-10 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-24 -mb-24 w-64 h-64 rounded-full bg-white opacity-10 blur-3xl"></div>

    <div class="relative z-10">
        <div class="flex justify-center mb-8 py-6">
            <div>
                <h2 id="widget-city-name" class="text-5xl  font-bold tracking-tight">Ciudad</h2>
                <p id="widget-date" class="text-orange-100 text-xl mt-1">Fecha</p>
            </div>
        </div>

        <div class="flex flex-col items-center justify-between gap-8">
            <div class="flex items-center">
                <img id="widget-icon" src="" alt="Weather Icon" class="w-28 h-28 md:w-56 md:h-56 drop-shadow-lg">
                <div class="ml-4">
                    <span id="widget-temp" class="text-5xl md:text-5xl font-bold">--°</span>
                    <p id="widget-desc" class="text-xl text-orange-100 capitalize">--</p>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 bg-white/10 p-6 text-sm md:text-lg rounded-lg backdrop-blur-md w-full">
                <div class="text-center p-2">
                    <p class="text-orange-200 mb-1 text-xs md:text-sm uppercase tracking-wider font-medium">Humedad</p>
                    <p id="widget-humidity" class="text-2xl md:text-4xl font-bold">--%</p>
                </div>
                <div class="text-center p-2 border-l border-white/10">
                    <p class="text-orange-200 mb-1 text-xs md:text-sm uppercase tracking-wider font-medium">Viento</p>
                    <p id="widget-wind" class="text-2xl md:text-4xl font-bold">-- m/s</p>
                </div>
                <div class="text-center p-2 md:border-l border-white/10">
                    <p class="text-orange-200 mb-1 text-xs md:text-sm uppercase tracking-wider font-medium">Presión</p>
                    <p id="widget-pressure" class="text-2xl md:text-4xl font-bold">-- hPa</p>
                </div>
                <div class="text-center p-2 border-t md:border-t-0 border-white/10">
                    <p class="text-orange-200 mb-1 text-xs md:text-sm uppercase tracking-wider font-medium">Nubes</p>
                    <p id="widget-clouds" class="text-2xl md:text-4xl font-bold">--%</p>
                </div>
                <div class="text-center p-2 border-t border-l border-white/10">
                    <p class="text-orange-200 mb-1 text-xs md:text-sm uppercase tracking-wider font-medium">Sensación</p>
                    <p id="widget-feels-like" class="text-2xl md:text-4xl font-bold">--°</p>
                </div>
                <div class="text-center p-2 border-t border-l border-white/10">
                    <p class="text-orange-200 mb-1 text-xs md:text-sm uppercase tracking-wider font-medium">Visibilidad</p>
                    <p id="widget-visibility" class="text-2xl md:text-4xl font-bold">-- km</p>
                </div>
            </div>
        </div>
    </div>
</div>
