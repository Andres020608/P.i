<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="w-10 h-15 object-contain rounded-full transform scale-1 ">
                <span class="text-xl font-bold text-gray-800">Tienda</span>
            </a>

            <div class="space-x-4">
                <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Inicio</a>
                <a href="{{ route('categoria.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Categorías</a>
                <a href="{{ route('producto.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Productos</a>
            </div>
        </div>
    </x-slot>

    {{-- Fondo personalizado --}}
    <div class="relative py-12 bg-cover bg-center min-h-screen"
         style="background-image: url('{{ asset('img/anillosfondo.jpeg') }}');">
        {{-- Capa semitransparente para mejorar contraste --}}
        <div class="absolute inset-0 bg-white bg-opacity-20"></div>

        {{-- Contenido del dashboard --}}
        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white shadow-sm sm:rounded-lg p-8 bg-opacity-90">
                <h1 class="text-3xl font-extrabold text-gray-800 mb-4">JESSICA JOYERIA</h1>
                
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('img/logo.jpeg') }}" alt="Jessica Joyeria Logo" class="w-40 h-40 object-contain">
                </div>

                <p class="text-lg text-gray-700">¡Bienvenido a nuestra tienda de joyas!</p>
            </div>
        </div>
    </div>
</x-app-layout>
