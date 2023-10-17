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
                    <x-link href="{{ route('instructorViews.solicitar1') }}" class="m-4">Crear Solicitud </x-link>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Instructor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                @can('administrar')
                                <th scope="col" class="px-6 py-3">
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($solicitudComites as $solicitud)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $solicitud->instructor->ins_nombres }} {{ $solicitud->instructor->ins_apellidos }}
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
                                <td class="px-6 py-4">
                                    <!-- Agrega tus enlaces y botones de administración aquí -->
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