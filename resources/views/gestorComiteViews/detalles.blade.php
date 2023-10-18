<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $solicitud->id . '   - Resumen de la Solicitud' }}
        </h2>
    </x-slot>
</x-app-layout>
