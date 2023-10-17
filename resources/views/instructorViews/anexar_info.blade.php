<x-app-layout>
    <div class="py-12 ">
        <div class="bg-green-50 shadow-x mx-3 ">

            <p class="text-center text-2xl font-semibold mb-4">Anexar pruebas</p>
            <div class="mb-4 m-10">
                <label class="block text-sm font-medium text-gray-700">Descripcion</label>
                <textarea class="mt-3 p-3 w-full  mx-auto border rounded-md" rows="4"></textarea>
            </div>

            <div class="m-10">
                <x-label for="pru_url" value="{{ __('Anexar prueba') }}" />
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="pru_url" type="file" name="pru_url" accept="image/*">
                @error('pru_url')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex justify-left items-center py-6 m-10">
                <x-link href="#" class="mx-3 bg-green-700 hover:bg-green-500 border-2 border-green-950">Enviar</x-link>
                <x-link href="{{ url()->previous() }}" class="mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
            </div>
        </div>

    </div>

</x-app-layout>
