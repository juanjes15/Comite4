<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relaciona el usuario con un estudiante en la base de datos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('users.storeInstructor', $user) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input id="user" class="block mt-1 w-full" type="text" name="user"
                                :value="$user->id" required autofocus autocomplete="user" />
                        </div>
                        <div>
                            <x-label for="ins_id" value="{{ __('Instructores') }}" />
                            <select name="ins_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione un Instructor--</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">
                                        {{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Guardar') }}
                            </x-button>
                            <x-link href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
