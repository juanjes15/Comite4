<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="name" value="{{ __('Nombre') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="$user->name" required autofocus autocomplete="name" />
                        </div>
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email"
                                :value="$user->email" required autofocus autocomplete="email" />
                        </div>
                        <div>
                            <x-label for="rol" value="{{ __('Rol') }}" />
                            <select id="rol" name="rol"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option>--Seleccione el rol--</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Gestor">Gestor de comités</option>
                                <option value="Subdirector">Subdirector</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ route('users.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
