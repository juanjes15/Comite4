<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar numeral') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('numerals.update', $numeral) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="num_descripcion" value="{{ __('Descripcion') }}" />
                            <x-input id="num_descripcion" class="block mt-1 w-full" type="text"
                                name="num_descripcion" :value="$numeral->num_descripcion" required autofocus
                                autocomplete="num_descripcion" />
                        </div>
                        <div>
                            <x-label for="num_tipoFalta" value="{{ __('Tipo de Falta') }}" />
                            <x-input id="num_tipoFalta" class="block mt-1 w-full" type="text" name="num_tipoFalta"
                                :value="$numeral->num_tipoFalta" required autofocus autocomplete="num_tipoFalta" />
                        </div>
                        <div>
                            <x-label for="num_calificacion" value="{{ __('Calificacion de la falta') }}" />
                            <x-input id="num_calificacion" class="block mt-1 w-full" type="text"
                                name="num_calificacion" :value="$numeral->num_calificacion" required autofocus
                                autocomplete="num_calificacion" />
                        </div>
                        <div>
                            <x-label for="art_id" value="{{ __('Articulo') }}" />
                            <select name="art_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($articulos as $articulo)
                                    @if ($articulo->id == $numeral->art_id)
                                        <option selected value="{{ $articulo->id }}">{{ $articulo->art_numero }}
                                        </option>
                                    @else
                                        <option value="{{ $articulo->id }}">{{ $articulo->art_numero }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ route('numerals.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>