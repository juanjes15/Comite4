<x-app-layout>

    <div class="py-12 ">
        <div class="bg-green-50 shadow-x " >
            <div class="max-w-3xl mx-auto p-6 mt-10">
                <p class="text-center text-2xl font-semibold mb-4">Concertar plan de mejoramiento</p>
                <div class="flex mb-6">
                    <div class="w-1/2 mr-2">
                        <label class="block text-sm font-medium text-gray-700">Area</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="w-1/2 ml-2">
                        <label class="block text-sm font-medium text-gray-700">Identificacion</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                </div>

                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label class="block text-sm font-medium text-gray-700">Fecha Inicial</label>
                        <input type="date" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="w-1/2 ml-2">
                        <label class="block text-sm font-medium text-gray-700">Aprendiz</label>
                        <select name="Aprendiz_id" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
                            <option value="" selected disabled>Selecciona un aprendiz</option>
                            @foreach($aprendizs as $Aprendiz)
                                <option value="{{ $Aprendiz->id }}">{{ $Aprendiz->apr_nombres }} {{ $Aprendiz->apr_apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label class="block text-sm font-medium text-gray-700">Fecha Final</label>
                        <input type="date" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="w-1/2 ml-2">
                        <label class="block text-sm font-medium text-gray-700">Programa</label>
                        <select name="Programa_id" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
                            <option value="" selected disabled>Selecciona un programa</option>
                            @foreach($programas as $Programa)
                                <option value="{{ $Programa->id }}">{{ $Programa->pro_nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label class="block text-sm font-medium text-gray-700">Instructor responsable</label>
                        <select name="instructor_id" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
                            <option value="" selected disabled>Selecciona un instructor</option>
                            @foreach($instructors as $Instructor)
                                <option value="{{ $Instructor->id }}">{{ $Instructor->ins_nombres }} {{ $Instructor->ins_apellidos }}</option>
                            @endforeach
                        </select>

                        <label class="block text-sm font-medium text-gray-700">Correo</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="w-1/2 ml-2">
                        <label class="block text-sm font-medium text-gray-700">Descripcion</label>
                        <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>
                    </div>
                </div>

                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label class="block text-sm font-medium text-gray-700">Objetivo del Plan</label>
                        <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>
                    </div>
                    <div class="w-1/2 ml-2">
                        <label class="block text-sm font-medium text-gray-700">Indicadores de Desempeño</label>
                        <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>
                    </div>
                </div>

                <div>
                    <x-label for="pru_url" value="{{ __('Anexar plan') }}" />
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="pru_url" type="file" name="pru_url" accept="image/*">
                    @error('pru_url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex justify-center items-center">
                    <x-link id="concertarP" href="#" class="mx-3 mt-5 bg-green-700 hover:bg-green-500 border-2 border-green-950">Concertar plan</x-link>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Selecciona el enlace por su ID
                            var concertarP = document.getElementById("concertarP");
                            // Agrega un evento click al enlace
                            concertarP.addEventListener("click", function(e) {
                                e.preventDefault(); // Previene el comportamiento predeterminado del enlace (navegar a otra página)

                                // Muestra una alerta con el mensaje de éxito
                                alert("¡Plan concertado con éxito!");
                            });
                        });
                    </script>
                    <x-link href="{{ url()->previous() }}" class="mx-3 mt-5 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
                </div>
            </div>


        </div>
    </div>

</x-app-layout>
