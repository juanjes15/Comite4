<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar  N° ') . $sol_id . ('   - Agregar las pruebas requeridas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50  overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructorViews.storeSolicitar4') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input id="sol_id" class="block mt-1 w-full" type="hidden" name="sol_id"
                                :value="$sol_id" required autofocus autocomplete="sol_id" />
                        </div>
                        <div>
                            <x-label for="pru_tipo" value="{{ __('Tipo') }}" />
                            <x-input id="pru_tipo" class="block mt-1 w-full" type="text" name="pru_tipo"
                                :value="old('pru_tipo')" required autofocus autocomplete="pru_tipo" />
                        </div>
                        <div>
                            <x-label for="pru_descripcion" value="{{ __('Descripcion') }}" />
                            <x-input id="pru_descripcion" class="block mt-1 w-full" type="text"
                                name="pru_descripcion" :value="old('pru_descripcion')" required autofocus
                                autocomplete="pru_descripcion" />
                        </div>
                        <div>
                            <x-label for="pru_fecha" value="{{ __('Fecha') }}" />
                            <x-input id="pru_fecha" class="block mt-1 w-full" type="date" name="pru_fecha"
                                :value="old('pru_fecha')" required autofocus autocomplete="pru_fecha" />
                        </div>
                        <div>
                            <x-label for="pru_url" value="{{ __('Anexar prueba') }}" />
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="pru_url" type="file" name="pru_url" accept="image/*">
                            @error('pru_url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>




                        <div class="flex mt-4">
                            <x-button class="bg-green-700 hover:bg-green-500 border-2 border-green-950">
                                {{ __('Siguiente') }}
                            </x-button>
                            <x-link href="{{ url()->previous() }}" class="mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950 ">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
