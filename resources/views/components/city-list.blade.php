<div class="overflow-y-auto  space-y-1 h-[690px]">

    @foreach($cities as $city)
    @php
    $imagePath = getCityImage($city->imagen);
    @endphp
    <div data-city-id="{{ $city->id }}"
        data-city-name="{{ $city->nombre }}"
        data-image-path="{{ $imagePath }}"
        class="cursor-pointer bg-white rounded-lg shadow-sm hover:shadow-md transition-all border border-gray-100 flex items-center justify-between gap-4 group p-6 mr-6 relative weather-city-card">
        <div class="flex items-center gap-4">
            <img src="{{ $imagePath }}" alt="{{ $city->nombre }}" class="w-24 h-24 rounded-full object-cover border-2 border-orange-100 group-hover:border-orange-400 transition-colors">
            <div>
                <h3 class="font-semibold text-gray-800 group-hover:text-orange-600 transition-colors text-2xl">{{ $city->nombre }}</h3>
                <p class="text-lg text-gray-400">{{ getCityLatLong($city->latitud, $city->longitud) }}</p>
            </div>
        </div>
        <div class="flex items-center">
            <a href="{{ route('cities.edit', $city) }}" onclick="event.stopPropagation()" class="p-3 text-gray-400 hover:text-orange-500 hover:bg-orange-50 rounded-full transition-all" title="Editar ciudad">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
            </a>
        </div>
    </div>
    @endforeach
    @if($cities->isEmpty())
    <div class="text-center py-16 bg-white rounded-lg border border-dashed border-gray-300">
        <p class="text-gray-500 mb-2">No hay ciudades registradas</p>
        <a href="{{ route('cities.create') }}" class="text-orange-600 hover:text-orange-800 font-medium text-sm">Registrar una ciudad ahora</a>
    </div>
    @endif
</div>
