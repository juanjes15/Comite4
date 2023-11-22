@php
    // Obtén la lista de solicitudes que aún no tienen fecha gestionada
    $solicitudesSinFecha = \App\Models\SolicitudComite::whereNull('sol_fechaSolicitud')->get();

    // Verifica si la solicitud actual no tiene fecha gestionada
    $solicitudSinFecha = $solicitudesSinFecha->contains('id', $solicitud->id);

    $fechaEnviada = session('fecha_enviada', false);
    $negar = session('negar', false);
@endphp
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
                                {{ $aprendiz->apr_nombres }} {{ $aprendiz->apr_apellidos }}
                            </p>
                        @endforeach

                        <p><strong>Fecha de Solicitud:</strong> {{ $solicitud->sol_fecha }}</p>
                        <p><strong>Lugar:</strong> {{ $solicitud->sol_lugar }}</p>
                        <p><strong>Asunto:</strong> {{ $solicitud->sol_asunto }}</p>
                        <p><strong>Motivo:</strong> {{ $solicitud->sol_motivo }}</p>
                        <p><strong>Estado:</strong> {{ $solicitud->sol_estado }}</p>
                    </div>
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

                        @unless ($fechaEnviada || $solicitud->sol_estado === 'Aceptado' || $solicitud->sol_estado === 'Negado' || session('negar'))
                            <form id="aceptar-form-{{ $solicitud->id }}"
                                action="{{ route('gestorComiteViews.gFechas', ['solicitud' => $solicitud->id]) }}"
                                method="POST">
                                @csrf
                                <x-button type="submit"
                                    class="bg-green-700 hover:bg-green-500 border-2 border-green-950 mx-4">
                                    {{ __('Aceptar comite') }}
                                </x-button>
                            </form>
                            <script>
                                // Muestra el formulario cuando se cargue la página
                                document.getElementById('aceptar-form-{{ $solicitud->id }}').style.display = 'inline';
                            </script>
                        @endunless
                        
                        @unless ($fechaEnviada || $solicitud->sol_estado === 'Aceptado' || $solicitud->sol_estado === 'Negado' || session('negar'))
                            <form method="POST"
                                action="{{ route('gestorComiteViews.destroy', ['solicitud' => $solicitud->id]) }}"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <x-danger-button type="submit" onclick="return confirm('¿Está seguro?')">
                                    Negar
                                </x-danger-button>
                            </form>
                        @endunless

                        




                        <x-link href="{{ route('gestorComiteViews.index') }}"
                            class="mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950">
                            {{ __('Atrás') }}
                        </x-link>
                    </div>


                </div>
            </div>
        </div>
</x-app-layout>
