<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <x-link href="{{ route('users.create') }}"
                        class="m-4 mb-6  mt-6 bg-green-700 hover:bg-yellow-500 border-2 border-green-950">
                        Añadir usuario</x-link>
                    <table class=" w-full text-sm text-left text-gray-500 ">
                        <thead class="bg-green-50 shadow-xl text-xs text-gray-700 uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3 ">
                                    Nombres
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rol
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @forelse ($users as $user)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 truncate max-w-xs">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $user->rol }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-link href="{{ route('users.edit', $user) }}"
                                            class="bg-green-700 hover:bg-green-500 border-2 border-green-950">
                                            Asignar rol</x-link>
                                        <form method="POST" action="{{ route('users.destroy', $user) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" onclick="return confirm('¿Está seguro?')"
                                                class="bg-green-700 hover:bg-red-800 border-2 border-green-950">
                                                Eliminar</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron usuarios') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $users->links() !!}
    </div>
</x-app-layout>
