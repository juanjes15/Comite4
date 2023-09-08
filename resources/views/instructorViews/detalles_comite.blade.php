<x-app-layout>    
<div class="max-w-3x1 mx-auto p-6 mt-10">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Detalles comité</h1>
        <div class="flex flex-wrap -mx-4 mb-4">
            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
            </div>

            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
            </div>
        </div>

        <div class="flex flex-wrap -mx-4 mb-4">
            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
            </div>

            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Recomendación</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
            </div>
        </div>
        <div class="flex flex-wrap -mx-4 mb-4">
            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Instructor solicitante</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
            </div>

            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Aprendiz</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Calificación</label>
            <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Descripción de la Citación</label>
            <textarea class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" rows="4"></textarea>
        </div>
    </div>
    <x-link href="{{ url()->previous() }}" class="mx-3">Cancelar</x-link>
</x-app-layout>