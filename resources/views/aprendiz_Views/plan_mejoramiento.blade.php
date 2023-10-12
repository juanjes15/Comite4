<x-app-layout>

<div class="py-12 ">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4 bg-green-50 shadow-xl" >
            <div class="max-w-3xl mx-auto p-6">
                <div class="flex items-center justify-between mb-4">
                    <button
                        class="ml-4 px-4 py-2 border border-gray-300 text-gray-700 rounded-full hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500"
                        onclick="window.history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 inline-block" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Ir Atrás
                    </button>
                </div>
                <p class="text-lg font-semibold mb-4">Te damos la bienvenida al Plan de Mejoramiento diseñado para ayudarte a
                    alcanzar tus objetivos académicos y profesionales de manera efectiva.</p>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Area</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" value="Java" readonly>
                </div>

                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label class="block text-sm font-medium text-gray-700">Fecha Inicial</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md" value="01/01/2023" readonly>
                    </div>

                    <div class="w-1/2 mr-2">
                        <label class="block text-sm font-medium text-gray-700">Fecha Final</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md" value="01/05/2023" readonly>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Instructor Responsable</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" value="Andres Julian" readonly>
                </div>


                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Objetivo del Plan</label>
                    <textarea class="mt-1 p-2 w-full border rounded-md" rows="4" readonly>Mejorar las habilidades de liderazgo y toma de decisiones del aprendiz al enviarlo a comités de proyectos multidisciplinarios. A través de esta experiencia, el aprendiz desarrollará habilidades de trabajo en equipo, comunicación efectiva y resolución de problemas, contribuyendo así al crecimiento y el éxito de la institución</textarea>
                </div>


                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Indicadores de Desempeño</label>
                    <textarea class="mt-1 p-2 w-full border rounded-md" rows="4" readonly>
                - Cumplimiento de plazos de entrega de proyectos.
                - Participación activa en reuniones de comités.
                - Calidad de las contribuciones al trabajo en equipo.
                - Retroalimentación positiva de colegas y supervisores.
            </textarea>
                </div>

                
                <form action="{{ route('aprendiz_Views.plan_mejoramiento') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <div class="flex items-center">
            <div class="w-1/2 mr-2">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="mt-1 p-2 w-full border rounded-md" placeholder="Ingrese el email">
                @error('email')
                    <span class="text-red-500 text-sm my-1">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="flex items-center">
            <div class="w-1/2 mr-2">
                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="descripcion" class="mt-1 p-2 w-full border rounded-md" placeholder="Ingrese una descripción">
                @error('descripcion')
                    <span class="text-red-500 text-sm my-1">{{$message}}</span>
                @enderror
            </div>
            <div class="w-1/2 mr-2">
                <label class="block text-sm font-medium text-gray-700">Subir Archivos</label>
                <input type="file" name="url_documento" class="mt-1">
                @error('url_documento')
                    <span class="text-red-500 text-sm my-1">{{$message}}</span>
                @enderror
            </div>
            <div class="w-1/2 ml-2">
                <button type="submit" class="bg-green-700 hover:bg-green-500 py-1 px-1 ml-9 border-2 border-green-950 rounded transition duration-300 ease-in-out">Enviar Archivo</button>
            </div>
        </div>
    </div>
</form>


    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Calificación del Documento</label>
                    <p class="mt-1 p-2 w-full border rounded-md">Calificación obtenida: Excelente</p>
                </div>
                <p class="text-sm text-gray-500">Mucha suerte en el proceso.</p>
            </div>
        </div>
    </div>
    @if(session('success'))
    <script>
        alert('{{ session('success') }}');
        window.location.href = '{{ route('aprendiz_Views.consultas') }}';
    </script>
@endif




</x-app-layout>
