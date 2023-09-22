<x-app-layout>
    <div class="py-12 ">
        <div class="bg-green-50 shadow-x " >
            <div class="max-w-3x1 mx-auto p-5 mt-10">
                <p class="text-center text-2xl font-semibold mb-4">Consultar antecedentes</p>
                <form class="flex items-center py-6" >
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Consultar" required>
                    </div>
                    <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>Buscar
                    </button>
                </form>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Codigo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aprendiz
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
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Finalizado
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">

                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <x-link href="{{ route('instructorViews.detalles_antecedentes') }}" class="mx-3 mt-5 mb-6  mt-6 bg-green-700 hover:bg-yellow-500 border-2 border-green-950">Detalles</x-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <x-link href="{{ url()->previous() }}" class="mx-3 mx-5 mb-6  bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>

        </div>
    </div>

</x-app-layout>
