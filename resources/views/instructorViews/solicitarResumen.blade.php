<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $solicitud->id . '   - Resumen de la Solicitud' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" />

                    <!-- Solicitante Information -->
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        <h3 class="text-lg font-semibold mb-2">Información del Solicitante</h3>
                        <p><strong>Nombre Completo del Solicitante:</strong> {{ $solicitud->instructor->ins_nombres }}
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
                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <h3 class="text-lg font-semibold mb-2">Información de la Prueba</h3>
                            <p>Tipo de Prueba: {{ $prueba->pru_tipo }}</p>
                            <p>Url: {{ $prueba->pru_url }}</p>
                            <p><strong>Descripción de la Prueba:</strong> {{ $prueba->pru_descripcion }}</p>
                            <p><strong>Fecha de la Prueba:</strong> {{ $prueba->pru_fecha }}</p>
                        </div>
                    @endif

                    <!-- Información de las Faltas -->
                    @if (!empty($faltas))
                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <h3 class="text-lg font-semibold mb-2">Información de las Faltas</h3>
                            @foreach ($faltas as $falta)
                                <p><strong>Número del Capítulo:</strong> {{ $falta['cap_numero'] }}</p>
                                <p><strong>Descripción del Capítulo:</strong> {{ $falta['cap_descripcion'] }}</p>
                                <p><strong>Número del Artículo:</strong> {{ $falta['art_numero'] }}</p>
                            @endforeach
                        </div>
                    @endif




                    <!-- Botones -->
                    <div class="flex mt-4">
                        <x-button class="bg-blue-500 hover:bg-blue-700 text-white">
                            {{ __('Finalizar') }}
                        </x-button>
                        <x-link href="{{ url()->previous() }}"
                            class="mx-3 text-blue-500 hover:underline">Atrás</x-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
