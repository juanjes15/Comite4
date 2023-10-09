<x-app-layout>
    <div class="bg-green-50 shadow-x">
        <div class="max-w-3x1 mx-auto p-4 mt-10">
        <p class="text-center text-2xl font-semibold mb-4">Consultar comité</p>
            <div class="max-w-3x1 mx-auto p-5 mt-10">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID solicitud
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Instructor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($solicitudComites as $solicitud)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $solicitud->id}}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $instructors[$solicitud->id]->ins_nombres }} {{ $instructors[$solicitud->id]->ins_apellidos }}
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $solicitudDates[$solicitud->id] }}
                                    </td>
                                    @can('administrar')
                                        <td scope="col" class="px-6 py-3">
                                        <x-link href="detalles_comite">Detalles</x-link><!-- Agrega aquí el código para las acciones de administrar -->
                                        
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron solicitudes') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <x-link href="{{ url()->previous() }}" class="mx-3 mx-5 mb-6  bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
        </div>
    </div>
</x-app-layout>

