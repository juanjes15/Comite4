<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan Mejoramiento') }}
        </h2>
    </x-slot>
    <div class="flex justify mt-5 ">
        <x-link href="{{ route('instructorViews.plan_Mejoramiento') }}" class="ml-3 mb-6  mt-6 bg-green-700 hover:bg-yellow-500 border-2 border-green-950">Concertar plan</x-link>
    </div>
    <div class="py-12">
        <div class="max-w-3xl mx-auto  py-10 bg-green-50 shadow-xl rounded-lg " >
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Fecha Inicio
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha Fin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aprendiz
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Asignación
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b ">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <x-link href="{{ route('instructorViews.registrar_resultado') }}" class="mx-3 mt-5 bg-green-700 hover:bg-green-500 border-2 border-green-950">Registrar resultado</x-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>

</x-app-layout>
