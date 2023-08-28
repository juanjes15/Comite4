<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div>
                    <x-label for="ins_id" value="{{ __('Instructor') }}" />
                    <div class="mt-1 w-full px-4 py-2 bg-gray-100 rounded-lg">
                        {{ $solicitudComite->instructor->ins_nombres }} {{ $solicitudComite->instructor->ins_apellidos }}
                    </div>
                </div>
                
                <div>
                    <x-label for="sol_lugar" value="{{ __('Lugar') }}" />
                    <div class="mt-1 w-full px-4 py-2 bg-gray-100 rounded-lg">{{ $solicitudComite->sol_lugar }}</div>
                </div>
                
                <div>
                    <x-label for="sol_asunto" value="{{ __('Asunto') }}" />
                    <div class="mt-1 w-full px-4 py-2 bg-gray-100 rounded-lg">{{ $solicitudComite->sol_asunto }}</div>
                </div>
                
                <div>
                    <x-label for="sol_motivo" value="{{ __('Motivo') }}" />
                    <div class="mt-1 w-full px-4 py-2 bg-gray-100 rounded-lg">{{ $solicitudComite->sol_motivo }}</div>
                </div>
                
                <div>
                    <x-label for="sol_fecha" value="{{ __('Fecha') }}" />
                    <div class="mt-1 w-full px-4 py-2 bg-gray-100 rounded-lg">{{ $solicitudComite->sol_fecha }}</div>
                </div>
                
                <div>
                    <x-label for="sol_estado" value="{{ __('Estado') }}" />
                    <div class="mt-1 w-full px-4 py-2 bg-gray-100 rounded-lg">{{ $solicitudComite->sol_estado }}</div>
                </div>
                <div class="flex mt-4">
                    <x-link href="{{ route('solicitudComites.index') }}" class="mx-3">Atras</x-link>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
