<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de solicitudes a comité') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @can('administrar')
                        <x-link href="{{ route('solicitudComites.create') }}" class="m-4">Crear comite</x-link>
                    @endcan
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Instructor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    lugar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Asunto
                                </th>
                                
                                <th scope="col" class="px-6 py-3">
                                    Fecha solicitud
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                @can('administrar')
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($solicitudComites as $solicitudComite)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->instructor->ins_nombres }}
                                        {{ $solicitudComite->instructor->ins_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->sol_lugar }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->sol_asunto }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->sol_fecha }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->sol_estado }}
                                    </td>
                                    @can('administrar')
                                        <td>
                                            <button>
                                                <x-link href="{{ route('solicitudComites.edit', $solicitudComite) }}">
                                                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"/>
                                                    </svg>
                                                </x-link>
                                                
                                            </button>

                                        </td>
                                        <td>
                                            <button>
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.656 12.115a3 3 0 0 1 5.682-.015M13 5h3m-3 3h3m-3 3h3M2 1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm6.5 4.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                                </svg>
                                            </button>

                                        </td>


                                        <td class="text-center">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-9" viewBox="0 0 20 20" fill="blackColor">
                                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </td>


                                    @endcan
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron solicitudes de comites') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $solicitudComites->links() !!}
    </div>
</x-app-layout>
