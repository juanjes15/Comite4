<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar nueva impugnación') }}
        </h2>
    </x-slot>
    <body class="bg-gray-100">
        <div class="container max-w-6xl mx-auto p-6 mt-10">
            <form class="mt-4" action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block mb-2" for="fecha_impugnacion">Fecha de impugnación</label>
                    <input type="date" name="fecha_impugnacion" id="fecha_impugnacion" class="w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block mb-2" for="motivo_impugnacion">Motivo de impugnación</label>
                    <textarea name="motivo_impugnacion" id="motivo_impugnacion" class="w-full px-4 py-2 border rounded" rows="4"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Subir archivos</label>
                    <input type="file" name="archivos" id="archivos" class="hidden" accept=".pdf,.doc,.docx" onchange="updateFileName(this)">
                    <label for="archivos" class="px-4 py-2 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-600">
                        <i class="fas fa-cloud-upload-alt mr-2"></i> Examinar
                    </label>
                    <span id="selected-file" class="ml-2"></span>
                </div>

                <div class="mb-4">
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        <i class="fas fa-check-circle mr-2"></i> Enviar
                    </button>
                    <a href="" class="px-4 py-2 border rounded">
                        <i class="fas fa-times-circle mr-2"></i> Cancelar
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
</x-app-layout>
