<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('solicitudComites.store') }}">
                        @csrf
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
                            <x-label for="apr_id" value="{{ __('Aprendiz') }}" />
                            <select name="apr_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el aprendiz--</option>
                                @foreach ($aprendizs as $aprendiz)
                                    <option value="{{ $aprendiz->id }}">{{ $aprendiz->apr_nombres }} {{ $aprendiz->apr_apellidos }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-label for="pro_id" value="{{ __('Programas') }}" />
                            <select name="pro_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Programa--</option>
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->id }}">{{ $programa->pro_codigo }}-{{ $programa->pro_nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-label for="cap_id" value="{{ __('Capitulo') }}" />
                            <select name="cap_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el capitulo--</option>
                                @foreach ($capitulos as $capitulo)
                                    <option value="{{ $capitulo->id }}">{{ $capitulo->cap_numero }}-{{ $capitulo->cap_descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-label for="art_id" value="{{ __('Articulo') }}" />
                            <select name="art_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el articulo-</option>
                                @foreach ($articulos as $articulo)
                                    <option value="{{ $articulo->id }}">{{ $articulo->art_numero }}-{{ $articulo->art_descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-label for="num_id" value="{{ __('Numeral') }}" />
                            <select name="num_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Numeral-</option>
                                @foreach ($numerals as $numeral)
                                    <option value="{{ $numeral->id }}">
                                        {{ Illuminate\Support\Str::limit($numeral->num_descripcion, 50) }}
                                        -
                                        {{ Illuminate\Support\Str::limit($numeral->num_tipoFalta, 50) }}
                                        -
                                        {{ Illuminate\Support\Str::limit($numeral->num_calificacion, 50) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        

                        <div>
                            <x-label for="sol_fecha" value="{{ __('Fecha') }}" />
                            <x-input id="sol_fecha" class="block mt-1 w-full" type="date" name="sol_fecha"
                                :value="old('sol_fecha')" required autofocus autocomplete="sol_fecha" />
                        </div>

                        <div>
                            <x-label for="sol_lugar" value="{{ __('Lugar') }}" />
                            <x-input id="sol_lugar" class="block mt-1 w-full" type="text" name="sol_lugar"
                                :value="old('sol_lugar')" required autofocus autocomplete="sol_lugar" />
                        </div>

                        <div>
                            <x-label for="sol_asunto" value="{{ __('Asunto') }}" />
                            <x-input id="sol_asunto" class="block mt-1 w-full" type="text" name="sol_asunto"
                                :value="old('sol_asunto')" required autofocus autocomplete="sol_asunto" />
                        </div>

                        <div>
                            <x-label for="sol_motivo" value="{{ __('Motivo') }}" />
                            <x-input id="sol_motivo" class="block mt-1 w-full" type="text" name="sol_motivo"
                                :value="old('sol_motivo')" required autofocus autocomplete="sol_motivo" />
                        </div>

                        <div>
                            <x-label for="sol_estado" value="{{ __('Estado') }}" />
                            <x-input id="sol_estado" class="block mt-1 w-full" type="text" name="sol_estado"
                                :value="old('sol_estado')" required autofocus autocomplete="sol_estado" />
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
                                {{ __('Crear') }}
                            </x-button>
                            <x-link href="{{ route('solicitudComites.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
