@extends('layouts.app')

@section('content')

<div class="px-4">
    <div class="flex justify-end">
        <a href="{{ route('cities.create') }}" class="px-6 py-3 mb-4 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors text-xl md:text-2xl">
            Registrar ciudad
        </a>
    </div>
    <div id="ajax-error" class="hidden md:col-span-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Error!</strong>
        <span id="ajax-error-message" class="block sm:inline"></span>
    </div>

    <div class="md:flex md:flex-row gap-6 justify-center pb-12">
        <div class="space-y-3 h-[650px] ">
            <h2 class="text-4xl mb-6 font-bold text-gray-800">Ciudades Registradas</h2>
            <x-city-list :cities="$cities" />
        </div>
        <div class="h-[650px] md:max-w-[700px] w-full mt-12  py-16 md:py-0">
            <x-weather-widget />
        </div>
    </div>


</div>

@endsection
@push('scripts')
<script src="{{ asset('js/app.js') }}" defer></script>
@endpush
