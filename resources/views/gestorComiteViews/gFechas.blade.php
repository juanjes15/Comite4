<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $solicitud->id . '   - Resumen de la Solicitud' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50 shadow-xl overflow-hidden  sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">

                    <form action="{{ route('gestorComiteViews.gFechas', ['solicitud' => $solicitud->id]) }}" method="post">
                        @csrf
                        @method('put') {{-- Cambiado de 'gFechas' a 'put' --}}
                        
                        <div class="p-8 m-8 text-center"> 
                            <label for="date">Fecha</label>
                            <input type="date" name="date" id="date">
                        </div>
                        
                        <x-danger-button class="inline-block" type="submit" onclick="return confirm('¿Está seguro?')">
                            Enviar Fecha
                        </x-danger-button>
                    </form>
                    
                    
                </div>
            </div>
        </div>
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




