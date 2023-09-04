<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Solicitud - Agrega las acciones ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructorViews.storeSolicitar5') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="sol_id" value="{{ __('ID Solicitud') }}" />
                            <x-input id="sol_id" class="block mt-1 w-full" type="text" name="sol_id"
                                :value="$sol_id" required autofocus autocomplete="sol_id" />
                        </div>
                        <div>
                            <x-label for="cap_id" value="{{ __('Capitulos') }}" />
                            <select name="cap_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Capitulo-</option>
                                @foreach ($capitulos as $cap)
                                    <option value="{{ $cap->id }}">{{ $cap->cap_numero }}
                                        {{ $cap->cap_descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-label for="art_id" value="{{ __('Articulos') }}" />
                            <select name="art_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Articulos-</option>
                                @foreach ($articulos as $art)
                                    <option value="{{ $art->id }}">{{ $art->art_numero }}
                                        {{ $art->art_descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-label for="num_id" value="{{ __('Descripcion') }}" />
                            <select name="num_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione la descripcion-</option>
                                @foreach ($numerals as $num)
                                    <option value="{{ $num->id }}" title="{{ $num->num_descripcion }}">{{ substr($num->num_descripcion, 0, 100) }}{{ strlen($num->num_descripcion) > 50 ? '...' : '' }}{{$num->num_calificacion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Siguiente') }}
                            </x-button>
                            <x-link href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
