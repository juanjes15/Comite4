<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-8">Reglamento del aprendiz</h1>

        <form method="post" action="{{ route('aprendiz_Views.reglamento') }}" class="mb-12">
            @csrf
            <div class="mb-4">
                <label for="consulta" class="block text-lg text-gray-600 mb-2">Realizar consulta por:</label>
                <select class="w-full p-2 border rounded-lg shadow-md focus:outline-none focus:ring focus:border-blue-500" name="opcion">
                    <option value="numeral">Numeral</option>
                    <option value="articulo">Artículo</option>
                    <option value="capitulo">Capítulo</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="termino" class="block text-lg text-gray-600 mb-2">Término de búsqueda:</label>
                <input type="text" class="w-full p-2 border rounded-lg shadow-md focus:outline-none focus:ring focus:border-blue-500" id="termino" name="termino" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg text-lg transition duration-300 transform hover:scale-105">Buscar</button>
        </form>

        @if(isset($resultados))
            <h2 class="text-3xl font-semibold mb-6">Resultados:</h2>
            <div class="overflow-x-auto mb-4">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Descripción</th>
                            <th class="px-6 py-4">Tipo de Falta</th>
                            <th class="px-6 py-4">Calificación</th>
                            <th class="px-6 py-4">Artículo ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultados as $resultado)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-6 py-4">{{ $resultado->id }}</td>
                                <td class="border px-6 py-4">{{ $resultado->num_descripcion }}</td>
                                <td class="border px-6 py-4">{{ $resultado->num_tipoFalta }}</td>
                                <td class="border px-6 py-4">{{ $resultado->num_calificacion }}</td>
                                <td class="border px-6 py-4">{{ $resultado->art_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="{{ asset('storage/resultados.pdf') }}" download="resultados.pdf" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg text-lg transition duration-300 transform hover:scale-105 inline-block mt-4">
                    Descargar Reglamento
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
