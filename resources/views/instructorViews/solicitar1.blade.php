<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-xl text-gray-800   leading-tight">
            {{ __('Solicitar Comité') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 " >
            <div class="bg-green-50 shadow-xl  sm:rounded-lg ">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <h2 class="mb-2 text-lg font-semibold text-gray-900">Pasos para solicitar un comité:</h2>
                    <ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside">
                        <li>
                            Llenar formulario de información básica de la solicitud
                        </li>
                        <li>
                            Añadir los aprendices involucrados en dicha solicitud
                        </li>
                        <li>
                            Añadir las pruebas que sustentan la solicitud
                        </li>
                        <li>
                            Añadir las normas del reglamento infringidas
                        </li>
                    </ol>
                    <x-link href="{{ route('instructorViews.solicitar2') }}" class="mx-3 mt-5  bg-green-700 hover:bg-green-500 border-2 border-geen-950 ">Comenzar</x-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
