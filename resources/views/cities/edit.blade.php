@extends('layouts.app')

@section('content')
<div>
  <div class="flex flex-col md:flex-row justify-between items-center gap-8 py-4">
    <a href="{{ route('cities.index') }}" class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors text-xl md:text-2xl text-center inline-block">
      Volver
    </a>
    <h2 class="text-3xl font-extrabold mb-8 text-gray-900  ">Editar Ciudad: {{ $city->nombre }}</h2>
  </div>

  <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg border border-gray-100">

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl lg:relative" role="alert">
      <strong class="font-bold">¡Éxito!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
      <strong class="font-bold">¡Error!</strong>
      <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif


    <form action="{{ route('cities.update', $city) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <x-form-city :city="$city" />

      <div class="mt-12 flex justify-center">
        <button type="submit" class="cursor-pointer md:w-1/2 text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-extrabold rounded-lg text-2xl px-8 py-5 text-center transition-all shadow-lg hover:shadow-orange-200 ">
          Actualizar Ciudad
        </button>
      </div>
    </form>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
</div>
@endsection
