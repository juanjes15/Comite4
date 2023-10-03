<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $solicitud->id . '   - Resumen de la Solicitud' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50 shadow-xl overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" />

                    <!-- Solicitante Information -->
                    <div class="bg-green-100 p-4 rounded-lg mb-4">
                        <h3 class="text-lg font-semibold mb-2">Información del Solicitante</h3>
                        <p><strong>Nombre Completo del instructor Solicitante:</strong>
                            {{ $solicitud->instructor->ins_nombres }}
                            {{ $solicitud->instructor->ins_apellidos }}
                        </p>

                        {{-- Aprendices --}}
                        @foreach ($aprendices as $aprendiz)
                            <p><strong>Nombre del Aprendiz Solicitado: </strong>
                                <!-- Detalles del Aprendiz -->
                                {{ $aprendiz->apr_nombres }} {{ $aprendiz->apr_apellidos }}
                            </p>
                        @endforeach

                        <p><strong>Fecha de Solicitud:</strong> {{ $solicitud->sol_fecha }}</p>
                        <p><strong>Lugar:</strong> {{ $solicitud->sol_lugar }}</p>
                        <p><strong>Asunto:</strong> {{ $solicitud->sol_asunto }}</p>
                        <p><strong>Motivo:</strong> {{ $solicitud->sol_motivo }}</p>
                        <p><strong>Estado:</strong> {{ $solicitud->sol_estado }}</p>
                    </div>

                    <!-- Prueba Information -->
                    @if ($prueba)
                        <div class="bg-green-100 p-4 rounded-lg mb-4">
                            <h3 class="text-lg font-semibold mb-2">Información de la Prueba</h3>
                            <p>Tipo de Prueba: {{ $prueba->pru_tipo }}</p>
                            <p>Url: {{ $prueba->pru_url }}</p>
                            <p><strong>Descripción de la Prueba:</strong> {{ $prueba->pru_descripcion }}</p>
                            <p><strong>Fecha de la Prueba:</strong> {{ $prueba->pru_fecha }}</p>
                        </div>
                    @endif
                    <!-- Información de las Faltas -->

                    <div class="bg-green-100 p-4 rounded-lg mb-4">
                        <h3 class="text-lg font-semibold mb-2">Información de las Faltas</h3>

                        <p><strong>Número del Capítulo: </strong>{{ $cap_numero }} </p>
                        <p><strong>Descripción del Capítulo:</strong>{{ $cap_descripcion }}</p>

                        {{-- Articulos --}}
                        @foreach ($articulos as $articulo)
                            <strong>
                                <p> Articulo seleccionado :
                            </strong> {{ $articulo->art_descripcion }}</p>
                        @endforeach

                        <!-- Dentro de tu vista "solicitarResumen.blade.php" -->
                        @foreach ($numerals as $numeral)
                            <p><strong>Descripción del Numeral: </strong>{{ $numeral->num_descripcion }}</p>
                        @endforeach
                    </div>

                    <div class="flex mt-4">
                        <x-button id="finalizar-button" class="bg-green-700 hover:bg-green-500 border-2 border-green-950">
                            {{ __('Finalizar') }}
                        </x-button>
                        <x-link href="{{ url()->previous() }}"
                            class="mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atrás</x-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Agrega SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Agrega SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        const finalizarButton = document.querySelector("#finalizar-button");

        finalizarButton.addEventListener("click", function() {
            // Utiliza SweetAlert2 para mostrar el mensaje emergente
            Swal.fire({
                title: "La solicitud ha sido creada",
                icon: "success",
                confirmButtonText: "Aceptar",
                customClass: {
                    popup: 'bg-green-50 shadow-x', // Cambia el color de fondo de la alerta
                    content: 'text-green-800', // Cambia el color del texto de la alerta
                    confirmButton: 'bg-green-700 hover:bg-green-500 border-2 border-green-950' // Cambia el color del botón
                }
            }).then(() => {
                // Redirige a la otra vista después de hacer clic en "Aceptar"
                window.location.href = "{{ route('solicitudComites.index') }}";

            });
        });
    });
</script>




//npm install sweetalert2
