<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('solicitudComites.update', $solicitudComite) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="ins_id" value="{{ __('Instructor') }}" />
                            <select name="ins_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Instructor--</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}</option>
                                @endforeach
                            </select>
                        </div>

                    
                        <div>
                            <x-label for="sol_lugar" value="{{ __('Lugar') }}" />
                            <x-input id="sol_lugar" class="block mt-1 w-full" type="text" name="sol_lugar"
                                :value="$solicitudComite->sol_lugar" required autofocus autocomplete="sol_lugar" />
                        </div>

                        <div>
                            <x-label for="sol_asunto" value="{{ __('Asunto') }}" />
                            <x-input id="sol_asunto" class="block mt-1 w-full" type="text" name="sol_asunto"
                                :value="$solicitudComite->sol_asunto" required autofocus autocomplete="sol_asunto" />
                        </div>

                        <div>
                            <x-label for="sol_motivo" value="{{ __('Motivo') }}" />
                            <x-input id="sol_motivo" class="block mt-1 w-full" type="text" name="sol_motivo"
                                :value="$solicitudComite->sol_motivo" required autofocus autocomplete="sol_motivo" />
                        </div>

                        <div>
                            <x-label for="sol_fecha" value="{{ __('Fecha') }}" />
                            <x-input id="sol_fecha" class="block mt-1 w-full" type="text" name="sol_fecha"
                                :value="$solicitudComite->sol_fecha" required autofocus autocomplete="sol_fecha" />
                        </div>

                        <div>
                            <x-label for="sol_estado" value="{{ __('Estado') }}" />
                            <x-input id="sol_estado" class="block mt-1 w-full" type="text" name="sol_estado"
                                :value="$solicitudComite->sol_estado" required autofocus autocomplete="sol_estado" />
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ route('solicitudComites.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
