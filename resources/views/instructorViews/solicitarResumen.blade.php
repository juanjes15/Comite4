<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $sol_id . ('   - Resumen de la Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <p>Nombre Completo del solicitante : {{ session('ins_nombres') }} {{ session('ins_apellidos') }}</p>
                    <p>Fecha de solicitud: {{ session('sol_fecha') }}</p>
                    <p>Asunto: {{ session('sol_asunto') }}</p>
                    <p>Motivo: {{ session('sol_motivo') }}</p>
                    <p>Estado: {{ session('sol_estado') }}</p>

                    <div class="flex mt-4">

                        <x-button>
                            {{ __('Finalizar') }}
                        </x-button>
                        <x-link href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
