<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $sol_id . ('    - Registrar novedades ') . '  - Actualizar aprendices' }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50 shadow-xl overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructorViews.storeRegistrar_novedad3', $solicitud->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input id="sol_id" class="block mt-1 w-full" type="hidden" name="sol_id"
                                :value="$sol_id" required autofocus autocomplete="sol_id" />
                        </div>

                        @foreach ($solicitud->aprendizs as $aprendiz)
                            <div>
                                <x-label for="apr_id_{{ $aprendiz->id }}" value="{{ __('Aprendiz') }}" />
                                <select name="apr_id_{{ $aprendiz->id }}" id="apr_id_{{ $aprendiz->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    @foreach ($aprendizs as $otroAprendiz)
                                        <option value="{{ $otroAprendiz->id }}"
                                            {{ $aprendiz->id == $otroAprendiz->id ? 'selected' : '' }}>
                                            {{ $otroAprendiz->apr_nombres }} {{ $otroAprendiz->apr_apellidos }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                        <div class="flex mt-4">
                            <x-button class="bg-green-700 hover:bg-green-500 border-2 border-green-950">
                                {{ __('Siguiente') }}
                            </x-button>
                            <x-link href="{{ url()->previous() }}"
                                class="mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
