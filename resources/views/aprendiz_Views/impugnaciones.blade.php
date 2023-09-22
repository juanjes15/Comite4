<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar nueva impugnación') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100  ">
        <div class=" bg-green-50 shadow-xl
        px-1 py-12 rounded mt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">
                <div class="container mx-auto mt-8">
                    <form class="mt-4" action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-2" for="fecha_impugnacion">Fecha de impugnación</label>
                            <input type="date" name="fecha_impugnacion" id="fecha_impugnacion"
                                class="w-full px-4 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2" for="motivo_impugnacion">Motivo de impugnación</label>
                            <textarea name="motivo_impugnacion" id="motivo_impugnacion" class="w-full px-4 py-2 border rounded" rows="4"></textarea>
                        </div>

                        <div>
                            <x-label for="pru_url" value="{{ __('Anexar impugnacion') }}" />
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="pru_url" type="file" name="pru_url" accept="image/*">
                            @error('pru_url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-1 mt-6  ">
                            <button type="submit" class="bg-green-700 hover:bg-green-500 border-2 border-green-950 px-3 py-1  text-black rounded ">
                                <i class="fas fa-check-circle mr-1"></i> Enviar
                            </button>
                            <a href="" class="px-3 py-1 ml-3 bg-green-700 hover:bg-red-800 border-2 border-green-950 border rounded">
                                <i class="fas fa-times-circle mr-1 "></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </body>
            <script>
                function updateFileName(input) {
                    const selectedFile = document.getElementById('selected-file');
                    selectedFile.textContent = input.files[0] ? input.files[0].name : '';
                }
            </script>

            </div>
        </div>

</x-app-layout>
