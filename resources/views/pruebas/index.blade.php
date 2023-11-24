<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de pruebas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <x-link href="{{ route('pruebas.create') }}" class="m-4">Añadir prueba</x-link>

                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tipo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>

                                <th scope="col" class="px-6 py-3">
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pruebas as $prueba)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $prueba->pru_tipo }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $prueba->pru_descripcion }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $prueba->pru_fecha }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-link href="{{ route('pruebas.edit', $prueba) }}">Editar</x-link>
                                        <form method="POST" action="{{ route('pruebas.destroy', $prueba) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" onclick="return confirm('¿Está seguro?')">
                                                Eliminar</x-danger-button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron pruebas') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $pruebas->links() !!}
    </div>
</x-app-layout>
