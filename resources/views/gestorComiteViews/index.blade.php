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
                    <x-link href="{{ route('instructorViews.solicitar1') }}" class="m-4 bg-green-700 hover:bg-green-500 border-2 border-green-950">Crear Solicitud </x-link>
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
                        
                                <td class="px-6 py-4 ">
                                    <!-- Agrega tus botones de administración aquí -->
                                    <x-link href="{{ route('gestorComiteViews.detalles') }}" class=" opacity-100 bg-transparent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 transition duration-150 ease-in-out" viewBox="0 0 20 20" fill="currentColor">
                                            <path class="w-5 h-5 text-green-500" d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                                        </svg>
                                    </x-link>
                                </td>
                                <td class="px-6 py-4">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 m-8 transition duration-75" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" class="flex-shrink-0 w-5 h-5 text-red-500" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
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