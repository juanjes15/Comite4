<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Solicitudes a Comite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @can('administrar')
                        <x-link href="{{ route('instructorViews.solicitar1') }}"
                            class="m-4 bg-green-700 hover:bg-green-500 border-2 border-green-950">Crear Solicitud </x-link>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>

                                <th scope="col" class="px-6 py-3">
                                    Instructor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aprendices Citados
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ver Detalles
                                </th>


                            </tr>

                        </thead>
                        <tbody>

                            @foreach ($solicitudComites as $solicitud)
                                <tr class="bg-white border-b">

                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $solicitud->instructor->ins_nombres }}
                                        {{ $solicitud->instructor->ins_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        @foreach ($solicitud->aprendizs as $aprendiz)
                                            {{ $aprendiz->apr_nombres }} {{ $aprendiz->apr_apellidos }},
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $solicitud->sol_fecha }}
                                    </td>
                                    @can('administrar')
                                        <td class="px-6 py-4 ">
                                            <!-- Agrega tus botones de administración aquí -->
                                            <x-link
                                                href="{{ route('gestorComiteViews.detalles', ['solicitud' => $solicitud->id]) }}">
                                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.656 12.115a3 3 0 0 1 5.682-.015M13 5h3m-3 3h3m-3 3h3M2 1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm6.5 4.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                                </svg>
                                            </x-link>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
