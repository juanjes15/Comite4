<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar novedades - Información Básica') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50 shadow-xl overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructorViews.storeRegistrar_novedad2', $solicitud->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="ins_id" value="{{ __('Instructor') }}" />
                            <select name="ins_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Instructor--</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->ins_nombres }}
                                        {{ $instructor->ins_apellidos }} - {{ $instructor->ins_area }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label for="sol_fecha" value="{{ __('Fecha') }}" />
                            <x-input id="sol_fecha" class="block mt-1 w-full" type="date" name="sol_fecha" :value="$solicitud->sol_fecha" required autofocus autocomplete="sol_fecha" />

                            <div>
                                <x-label for="sol_lugar" value="{{ __('Lugar') }}" />
                                <x-input id="sol_lugar" class="block mt-1 w-full" type="text" name="sol_lugar" :value="$solicitud->sol_lugar" required autofocus autocomplete="sol_lugar" />
                            </div>

                            <div>
                                <x-label for="sol_asunto" value="{{ __('Asunto') }}" />
                                <x-input id="sol_asunto" class="block mt-1 w-full" type="text" name="sol_asunto" :value="$solicitud->sol_asunto" required autofocus autocomplete="sol_asunto" />
                            </div>

                            <div>
                                <x-label for="sol_motivo" value="{{ __('Motivo') }}" />
                                <x-input id="sol_motivo" class="block mt-1 w-full" type="text" name="sol_motivo" :value="$solicitud->sol_motivo" required autofocus autocomplete="sol_motivo" />
                            </div>

                            <div>
                                <x-label for="sol_estado" value="{{ __('Estado') }}" />
                                <x-input id="sol_estado" class="block mt-1 w-full" type="text" name="sol_estado" :value="$solicitud->sol_estado" required autofocus autocomplete="sol_estado" />
                            </div>

                            <!-- Agrega el campo sol_id como un campo oculto en el formulario -->
                        <input type="hidden" name="sol_id" value="{{ $solicitud->id }}">

<div class="flex mt-4">
    <x-button class="bg-green-700 hover:bg-green-500 border-2 border-green-950">
        {{ __('Siguiente') }}
    </x-button>
    <x-link href="{{ url()->previous() }}" class="mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
</div>
</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>