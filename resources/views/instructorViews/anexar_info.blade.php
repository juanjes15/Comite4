<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 mt-10">
        <p class="text-center text-2xl font-semibold mb-4">Anexar pruebas</p>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Descripcion</label>
            <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Subir Archivos</label>
            <input type="file" class="mt-1">
        </div>
        <div class="flex justify-center items-center">
            <x-link href="#" class="mx-3 mt-5">Enviar</x-link>
        </div>
    </div>
    <x-link href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
</x-app-layout>