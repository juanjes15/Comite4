<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Solicitud - Resumen de la solicitud ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <div>
                        <x-label for="sol_id" value="{{ __('ID Solicitud') }}" />
                        <p>{{ $sol_id }}</p>
                    </div>
                    <div>
                        <x-label for="ins_id" value="{{ __('Nombre del instructor') }}" />
                        <p>{{ session('ins_nombres') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
