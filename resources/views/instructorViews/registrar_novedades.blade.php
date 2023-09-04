<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 mt-10">
        <p class="text-center text-2xl font-semibold mb-4">Registar Novedades</p>
        <div class="flex mb-4">
            <div class="w-1/2 mr-2">
                <label class="block text-sm font-medium text-gray-700">Aprendiz</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md">

                <label class="block text-sm font-medium text-gray-700">Programa</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="w-1/2 ml-2">
                <label class="block text-sm font-medium text-gray-700">Descripcion</label>
                <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>
            </div>
        </div>

        <div class="flex mb-4">
            <div class="w-1/2 mr-2">
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md">

                <label class="block text-sm font-medium text-gray-700">Fecha </label>
                <input type="date" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="w-1/2 ml-2">
                <label class="block text-sm font-medium text-gray-700">Novedades</label>
                <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>

                <label class="block text-sm font-medium text-gray-700">Subir Archivos</label>
                <input type="file" class="mt-1">
            </div>
        </div>
        <div class="flex justify-left items-left">
            <x-link href="#" class="mx-3 mt-5">Registrar Novedad</x-link>
        </div>
    </div>
    <x-link href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
</x-app-layout>