<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <div class="flex items-center justify-between mb-4">
            <button class="ml-4 px-4 py-2 border border-gray-300 text-gray-700 rounded-full hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500" onclick="window.history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Ir Atrás
            </button>
        </div>
        <p class="text-lg font-semibold mb-4">Te damos la bienvenida al Plan de Mejoramiento diseñado para ayudarte a alcanzar tus objetivos académicos y profesionales de manera efectiva.</p>

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


        <div class="mb-4 flex items-center">
            <div class="w-1/2 mr-2">
                <label class="block text-sm font-medium text-gray-700">Subir Archivos</label>
                <input type="file" class="mt-1">
            </div>
            <div class="w-1/2 ml-2">
                <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full shadow-md hover:shadow-lg transition duration-300 ease-in-out">Enviar Archivo</button>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Calificación del Documento</label>
            <p class="mt-1 p-2 w-full border rounded-md">Calificación obtenida: Excelente</p>
        </div>
        <p class="text-sm text-gray-500">Mucha suerte en el proceso.</p>
    </div>
</x-app-layout>