<x-app-layout>
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
       
        
<div class="flex items-center justify-between mb-4">
            <button class="ml-4 px-4 py-2 border border-gray-300 text-gray-700 rounded-full hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500" onclick="window.history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Ir Atrás
            </button>
        </div>

        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Detalles de citación a comité</h1>

        <div class="flex flex-wrap -mx-4 mb-4">
            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" readonly value="7528292">
            </div>

            <div class="w-1/2 px-4 mb-4">
    <label class="block text-sm font-medium text-gray-700">Fecha</label>
    <input type="date" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" readonly value="2023-09-01">
</div>

        </div>

        <div class="flex flex-wrap -mx-4 mb-4">
            <div class="w-1/2 px-4 mb-4">
                <label class="block text-sm font-medium text-gray-700">Lugar</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" readonly value="cad A">
            </div>

            <div class="w-1/2 px-4 mb-4">
    <label class="block text-sm font-medium text-gray-700">Instructor</label>
    <select name="instructor_id" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" disabled>
        @foreach($instructors as $instructor)
            <option value="{{ $instructor->id }}" disabled>{{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}</option>
        @endforeach
    </select>
</div>

        </div>

        <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Descripción de la Citación</label>
    <textarea class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" rows="4" readonly>El aprendiz agredio verbalmente al aprendiz</textarea>
</div>


    </div>
</x-app-layout>
