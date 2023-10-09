<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del comité ') }}
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
                </div>
            </div>
        </div>
        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('administrar')
                        <td scope="col" class="px-6 py-3">
                        <x-link href="{{ route('instructorViews.registrar_novedad2', ['sol_id' => $solicitud->id ]) }}">Registrar novedades</x-link><!-- Agrega aquí el código para las acciones de administrar -->
                        </td>
            @endcan
        </div>
</x-app-layout>
