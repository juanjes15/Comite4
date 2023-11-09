<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud N° ') . $solicitud->id . '   - Resumen de la Solicitud' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50 shadow-xl overflow-hidden  sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <form action="{{ route('gestorComiteViews.gFechas', $solicitud) }}" method="post">
                        @csrf
                        @method('gFechas')
                        
                        <div class="p-8 m-8 text-center"> 
                            <label for="date">Fecha</label>
                            <input type="date" name="date" id="date">
                        </div>
                        <x-danger-button  class="inline-block" type="submit" onclick="return confirm('¿Está seguro?')">
                            Enviar Fecha
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


