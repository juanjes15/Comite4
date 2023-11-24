<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $sol_id . ('   - Añadir acciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50  overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructorViews.storeSolicitar5') }}" enctype="multipart/form-data">
                        @csrf
                        <x-button type="button" id="agregarSelect" class="mb-6  mt-6 bg-green-700 hover:bg-yellow-500 border-2 border-green-950" >Agregar Otra descripción</x-button>
                        <div>
                            <x-input id="sol_id" class="block mt-1 w-full" type="hidden" name="sol_id"
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
                            <x-label for="num_id" value="{{ __('Descripción') }}" />
                            <select id="num_id" name="num_id[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione la descripción--</option>
                                @foreach ($numerals as $num)
                                    <option value="{{ $num->id }}" title="{{ $num->num_descripcion }}">{{ substr($num->num_descripcion, 0, 100) }}{{ strlen($num->num_descripcion) > 50 ? '...' : '' }}{{$num->num_calificacion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="contenedorSelects" class="mt-4">
                            <!-- Este será el contenedor de los nuevos campos <select> -->
                        </div>
                        <div class="flex mt-4">

                            <x-button class="bg-green-700 hover:bg-green-500 border-2 border-green-950">
                                {{ __('Finalizar') }}
                            </x-button>
                            <x-link href="{{ url()->previous() }}" class=" mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('agregarSelect').addEventListener('click', function () {
            var selectOriginal = document.getElementById('num_id');
            var nuevoSelect = selectOriginal.cloneNode(true);

            // Cambiar el id para evitar conflictos de ids
            var nuevoID = 'nuevo_descripcion_' + (document.querySelectorAll('select[name^="num_id"]').length + 1);
            nuevoSelect.setAttribute('id', nuevoID);

            // Cambiar el nombre para que todos tengan el mismo nombre
            nuevoSelect.setAttribute('name', 'num_id[]');

            var contenedorSelects = document.getElementById('contenedorSelects');

            // Agregar un elemento <br> para dar espacio
            var br = document.createElement('br');

            contenedorSelects.appendChild(nuevoSelect);
            contenedorSelects.appendChild(br);
        });
    </script>
</x-app-layout>
