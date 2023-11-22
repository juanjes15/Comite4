<x-app-layout>
    <div class="bg-green-50 shadow-x">
        <div class="max-w-3x1 mx-auto p-4 mt-10">
            <div class="max-w-3xl mx-auto p-6 bg-green-50 shadow-xl rounded-lg">
                <div class="flex items-center justify-between mb-4">
                </div>

                <h1 class="text-2xl font-semibold text-gray-800 mb-4">Detalles de citación a comité</h1>

                <div class="flex flex-wrap -mx-4 mb-4">
                    <div class="w-1/2 px-4 mb-4">
                        <label class="block text-sm font-medium text-gray-700">Código</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400"
                            readonly value="{{ $solicitud->id }}">
                    </div>

                    <div class="w-1/2 px-4 mb-4">
                        <label class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400"
                            readonly value="{{ $solicitud->sol_fecha }}">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-4 mb-4">
                    <div class="w-1/2 px-4 mb-4">
                        <label class="block text-sm font-medium text-gray-700">Lugar</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400"
                            readonly value="{{ $solicitud->sol_lugar }}">
                    </div>

                    <div class="w-1/2 px-4 mb-4">
                        <label class="block text-sm font-medium text-gray-700">Instructor</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400"
                            readonly value="{{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Descripción de la Citación</label>
                    <textarea class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" rows="4"
                        readonly>{{ $solicitud->sol_asunto }}</textarea>
                </div>
            </div>
            <x-link href="{{ route('aprendiz_Views.consultas') }}"
                class="mx-3 mx-5 mb-6 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
        </div>
    </div>
</x-app-layout>