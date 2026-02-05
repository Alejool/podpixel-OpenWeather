@extends('layouts.app')

@section('content')
<div >
    <div class="flex flex-col md:flex-row justify-between items-center gap-8 py-4">
        <a href="{{ route('cities.index') }}" class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors text-xl md:text-2xl text-center inline-block">
            Volver
        </a>
        <h2 class="text-3xl font-extrabold mb-8 text-gray-900  ">Registrar Nueva Ciudad</h2>
    </div>

    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lgshadow-lg border border-gray-100">

        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl

        lgrelative" role="alert">
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


        <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-6">
                    <div>
                        <label for="latitud" class="block mb-2 text-lg font-semibold text-gray-700  tracking-wider">Latitud (-90 a 90)</label>
                        <input type="number" step="any" id="latitud" name="latitud" value="{{ old('latitud') }}"
                            class="w-full p-4 bg-gray-50 border-1 text-gray-900 text-xl rounded-xl focus:ring-orange-500 focus:border-orange-500 @error('latitud') border-red-500  @enderror block transition-all"
                            placeholder="Ej: 4.7110" required>
                        @error('latitud') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="longitud" class="block mb-2 text-lg font-semibold text-gray-700  tracking-wider">Longitud (-180 a 180)</label>
                        <input type="number" step="any" id="longitud" name="longitud" value="{{ old('longitud') }}"
                            class="w-full p-4 bg-gray-50 border-1 text-gray-900 text-xl rounded-xl focus:ring-orange-500 focus:border-orange-500 @error('longitud') border-red-500  @enderror block transition-all"
                            placeholder="Ej: -74.0721" required>
                        @error('longitud') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="space-y-6 flex flex-col">
                    <div>
                        <label for="nombre" class="block mb-2 text-lg font-semibold text-gray-700  tracking-wider">Nombre de la Ciudad</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                            class="w-full p-4 bg-gray-50 border-1 text-gray-900 text-lg rounded-xl focus:ring-orange-500 focus:border-orange-500 @error('nombre') border-red-500  @enderror block transition-all"
                            placeholder="Ej: Bogotá" required>
                        @error('nombre') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="grow flex flex-col">
                        <label class="block mb-2 text-lg font-semibold text-gray-700  tracking-wider">Imagen de la Ciudad</label>
                        <div id="dropzone" class="relative group cursor-pointer grow border-1 border-orange-200 border-dashed rounded-2xl bg-gray-50 hover:bg-orange-50 transition-colors duration-200 overflow-hidden flex items-center justify-center min-h-[200px]">
                            <div id="dropzone-preview" class="hidden absolute inset-0 rounded-2xl overflow-hidden bg-white items-center justify-center">
                                <img id="preview-img" src="" class="h-full w-full object-cover">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="text-white text-lg font-bold">Cambiar imagen</span>
                                </div>
                            </div>
                            <div id="dropzone-prompt" class="flex flex-col items-center justify-center py-10">
                                <svg class="w-12 h-12 mb-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mb-2 text-lg text-gray-600 font-medium text-center px-4"><span class="font-bold text-orange-600">Haz clic</span> o arrastra una imagen</p>
                                <p class="text-sm text-gray-400">PNG, JPG o GIF (MAX. 2MB)</p>
                            </div>
                            <input type="file" id="imagen" name="imagen" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" required>
                        </div>
                        @error('imagen') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-center">
                <button type="submit" class="cursor-pointer md:w-1/2 text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-extrabold rounded-lg text-2xl px-8 py-5 text-center transition-all shadow-lg hover:shadow-orange-200 ">
                    Guardar Ciudad
                </button>
            </div>
        </form>
    </div>

    <script>
        const fileInput = document.getElementById('imagen');
        const dropzonePrompt = document.getElementById('dropzone-prompt');
        const previewDiv = document.getElementById('dropzone-preview');
        const previewImg = document.getElementById('preview-img');
        const dropzoneContainer = document.getElementById('dropzone');

        function handleFile(file) {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImg.src = event.target.result;
                    previewDiv.classList.remove('hidden');
                    previewDiv.classList.add('flex');
                    dropzonePrompt.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        fileInput.addEventListener('change', function(e) {
            handleFile(e.target.files[0]);
        });

        fileInput.addEventListener('dragenter', () => dropzoneContainer.classList.add('border-orange-500', 'bg-orange-50'));
        fileInput.addEventListener('dragleave', () => dropzoneContainer.classList.remove('border-orange-500', 'bg-orange-50'));
        fileInput.addEventListener('drop', (e) => {
            dropzoneContainer.classList.remove('border-orange-500', 'bg-orange-50');
            if (e.dataTransfer.files.length > 0) {
                handleFile(e.dataTransfer.files[0]);
            }
        });
    </script>
</div>
@endsection
