<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $sol_id . ('   - Añadir aprendices a la solicitud') }}
        </h2>
        <p>Sol_id: {{ $sol_id }}</p>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructorViews.storeSolicitar3') }}">
                        @csrf
                        <x-button type="button" id="agregarSelect"  class="mb-6  mt-6"  >Agregar Aprendiz</x-button>
                        <div>
                            <x-input id="sol_id" class="block mt-1 w-full" type="hidden" name="sol_id"
                                :value="$sol_id" required autofocus autocomplete="sol_id" />
                        </div>

                        <div>
                            <x-label for="apr_id" value="{{ __('Aprendiz') }}" />
                            <select name="apr_id" id="apr_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione el Aprendiz--</option>
                                @foreach ($aprendizs as $aprendiz)
                                    <option value="{{ $aprendiz->id }}">{{ $aprendiz->apr_nombres }}
                                        {{ $aprendiz->apr_apellidos }}</option>
                                @endforeach
                            </select>

                        </div>
                        <br>
                        <div id="contenedorSelects" class="mt-4">
                            <!-- Este será el contenedor de los nuevos campos <select> -->
                        </div>
                        <br>
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

    <script>
        document.getElementById('agregarSelect').addEventListener('click', function () {
            var selectOriginal = document.getElementById('apr_id');
            var nuevoSelect = selectOriginal.cloneNode(true);

            // Cambiar el nombre para evitar conflictos de nombres
            var nuevoNombre = 'nuevo_aprendiz_' + (document.querySelectorAll('select[name^="nuevo_aprendiz"]').length + 1);
            nuevoSelect.setAttribute('name', nuevoNombre);

            var contenedorSelects = document.getElementById('contenedorSelects');

            // Agregar un elemento <br> para dar espacio
            var br = document.createElement('br');

            contenedorSelects.appendChild(nuevoSelect);
            contenedorSelects.appendChild(br);
        });
    </script>
</x-app-layout>

