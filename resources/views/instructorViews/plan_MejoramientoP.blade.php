<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan de mejoramiento  N° ') . $sol_id }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-50 shadow-xl overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <div class="flex items-center justify-between mb-4">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                    <p class="text-lg font-semibold mb-4">Te damos la bienvenida al Plan de Mejoramiento diseñado para ayudarte a alcanzar tus objetivos académicos y profesionales de manera efectiva.</p>
                    <form method="POST" action="{{ route('instructorViews.plan_MejoramientoP') }}?solicitud={{ $sol_id }}">
                        @csrf
                        <div class="w-1/2 mr-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="mt-1 p-2 w-full border rounded-md">
                            </div>

                            <div class="mb-4">

                                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                                <input type="text" name="descripcion" value="{{ old('descripcion') }}" required autofocus autocomplete="descripcion" class="mt-1 p-2 w-full border rounded-md">
                            </div>
                        </div>
                        <div>
                            <div class="w-1/2 mr-2">
                                <label class="block text-sm font-medium text-gray-700">Subir Archivos</label>
                                <input type="file" name="url_documento" class="mt-1" required value="{{ old('url_documento') }}" required autofocus autocomplete="Area">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Area</label>
                                <input type="text" class="mt-1 p-2 w-full border rounded-md" name="Area" value="{{ old('Area') }}" required autofocus autocomplete="Area">
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-1/2 mr-2">
                                <label class="block text-sm font-medium text-gray-700">Fecha Inicial</label>
                                <input type="date" class="mt-1 p-2 w-full border rounded-md" name="Fecha_Inicial" value="{{ old('Fecha_inicial') }}">
                            </div>

                            <div class="w-1/2 mr-2">
                                <label class="block text-sm font-medium text-gray-700">Fecha Final</label>
                                <input type="date" class="mt-1 p-2 w-full border rounded-md" name="Fecha_final" value="{{ old('Fecha_final') }}">
                            </div>
                        </div>

                        <div>
                            <x-label for="Instructor_responsable" value="{{ __('Instructor') }}" />
                            <select name="Instructor_responsable" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($instructors as $instructor)
                                <option value="{{ $instructor->id }}">
                                    {{ $solicitud->instructor->ins_nombres }}
                                    {{ $solicitud->instructor->ins_apellidos }}
                                    - {{ $instructor->ins_area }}
                                </option>
                                @endforeach

                                @foreach ($instructors as $instructor)
                                <option value="{{ $instructor->id }}">{{ $instructor->ins_nombres }}
                                    {{ $instructor->ins_apellidos }} - {{ $instructor->ins_area }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Objetivo del Plan</label>
                            <textarea class="mt-1 p-2 w-full border rounded-md" name="Objetivo del Plan" rows="4" value="{{ old('Objetivo_del_plan') }}"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Indicadores de Desempeño</label>
                            <textarea class="mt-1 p-2 w-full border rounded-md" name="Indicadores de Desempeño" rows="4" value="{{ old('Indicadores_de_desempeño') }}"></textarea>
                        </div>
                    </form>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="flex mt-4 ">
                        <x-button class="bg-green-700 hover:bg-green-500 border-2 border-green-950">
                            {{ __('Enviar plan') }}
                        </x-button>
                        <x-link href="{{ url()->previous() }}" class="mx-3 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
