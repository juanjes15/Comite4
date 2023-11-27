<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de citación a comité ') }}
        </h2>
    </x-slot>
    <div class="bg-green-50 shadow-x">
        <div class="max-w-3x1 mx-auto p-4 mt-10">
            <div class="max-w-3xl mx-auto p-6 bg-green-50 shadow-xl rounded-lg">
                <div class="flex items-center justify-between mb-4">
                </div>

               

                <!-- Información del Solicitante -->
                <div class="bg-green-100 p-4 rounded-lg mb-4">
                    <h3 class="text-lg font-semibold mb-2">Información del Solicitante</h3>
                    <ul class="list-disc pl-4">
                        <li><strong>Código:</strong> {{ $solicitud->id }}</li>
                        <li><strong>Fecha:</strong> {{ $solicitud->sol_fecha }}</li>
                        <li><strong>Lugar:</strong> {{ $solicitud->sol_lugar }}</li>
                        <li><strong>Instructor:</strong> {{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}
                        </li>
                    </ul>
                </div>

                <x-link href="{{ route('aprendiz_Views.consultas') }}"
                    class=" mx-5 mb-6 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
            </div>
        </div>
</x-app-layout>