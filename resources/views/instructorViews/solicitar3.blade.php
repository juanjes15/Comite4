<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Solicitud - Añadir aprendices a la solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructorViews.storeSolicitar3') }}">
                        @csrf
                        <div>
                            <x-label for="sol_id" value="{{ __('Código') }}" />
                            <x-input  id="sol_id" class="block mt-1 w-full" type="text" name="sol_id"
                                :value="$sol_id" required autofocus autocomplete="sol_id"/>
                        </div>


                        <div>
                            <x-label for="apr_id" value="{{ __('Aprendiz') }}" />
                            <select name="apr_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Aprendiz--</option>
                                @foreach ($aprendizs as $aprendiz)
                                    <option value="{{ $aprendiz->id }}">{{ $aprendiz->apr_nombres }}
                                        {{ $aprendiz->apr_apellidos }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div>

                            <form method="POST" action="{{route('subir')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label for="archivo"><b>Archivo: </b></label><br>
                                <input type="file" name="archivo" required>
                                <input class="btn btn-success" type="submit" value="Enviar" >
                              </form>

                        </div> --}}

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Siguiente') }}
                            </x-button>
                            <x-link href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
