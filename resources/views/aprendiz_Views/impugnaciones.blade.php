<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar nueva impugnación') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="bg-green-50 shadow-xl px-1 py-12 rounded mt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="container mx-auto mt-8">
                    <form class="mt-4" action="{{ route('aprendiz_Views.impugnaciones') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                                <strong class="font-bold">Error:</strong>
                                <span class="block sm:inline">{{ session('error') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z"></path>
                                    </svg>
                                </span>
                            </div>
                        @endif

                        <br>
                        <div class="mb-4">
    <label class="block mb-2" for="identificacion">Identificación del aprendiz</label>
    <input type="text" name="apr_identificacion" id="identificacion" class="w-full px-4 py-2 border rounded" required pattern="[0-9]+">
    @error('apr_identificacion')
        <span class="text-red-500 text-sm my-1">{{ $message }}</span>
    @enderror
</div>


                        <div class="mb-4">
                            <label class="block mb-2" for="fecha_impugnacion">Fecha de impugnación</label>
                            <input type="date" name="apr_fechaImpugnacion" id="fecha_impugnacion" class="w-full px-4 py-2 border rounded" required>
                            @error('apr_fechaImpugnacion')
                                <span class="text-red-500 text-sm my-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2" for="motivo_impugnacion">Motivo de impugnación</label>
                            <textarea name="apr_motivoImpugnacion" id="motivo_impugnacion" class="w-full px-4 py-2 border rounded" rows="4" required></textarea>
                            @error('apr_motivoImpugnacion')
                                <span class="text-red-500 text-sm my-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-label for="apr_pruImpugnacion" value="{{ __('Anexar impugnacion') }}" />
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="apr_pruImpugnacion" type="file" name="apr_pruImpugnacion" accept="image/*" required>
                            @error('apr_pruImpugnacion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-1 mt-6">
                            <button type="submit" class="bg-green-700 hover:bg-green-500 border-2 border-green-950 px-3 py-1 text-black rounded">
                                <i class="fas fa-check-circle mr-1"></i> Enviar
                            </button>
                            <a href="" class="px-3 py-1 ml-3 bg-green-700 hover:bg-red-800 border-2 border-green-950 border rounded">
                                <i class="fas fa-times-circle mr-1"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <x-link href="{{ route('aprendiz_Views.consultas') }}" class="mx-3 mx-5 mb-6 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atrás</x-link>
    </div>
    <!-- En tu vista blade -->
@if(session('status') == 'success')
    <!-- Agrega SweetAlert2 CSS y JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        // Muestra la alerta
        Swal.fire({
            title: "¡Éxito!",
            text: "{{ session('message') }}",
            icon: "success",
            confirmButtonText: "Aceptar",
            customClass: {
                popup: 'bg-green-50 shadow-x',
                content: 'text-green-800',
                confirmButton: 'bg-green-700 hover:bg-green-500 border-2 border-green-950'
            }
        });
    </script>
@endif
</x-app-layout>
