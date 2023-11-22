<x-app-layout>
    <div class="bg-green-50 shadow-x">
        <div class="max-w-3x1 mx-auto p-4 mt-10">
            <div class="py-12">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4 bg-green-50 shadow-xl">
                    <div class="max-w-3xl mx-auto p-6">
                        <div class="flex items-center justify-between mb-4">
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                        <p class="text-lg font-semibold mb-4">Te damos la bienvenida al Plan de Mejoramiento diseñado
                            para ayudarte a alcanzar tus objetivos académicos y profesionales de manera efectiva.</p>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Área</label>
                            <input type="text" class="mt-1 p-2 w-full border rounded-md"
                                value="{{ $planMejoramiento->Area }}" readonly>
                        </div>

                        <div class="flex mb-4">
                            <div class="w-1/2 mr-2">
                                <label class="block text-sm font-medium text-gray-700">Fecha Inicial</label>
                                <input type="text" class="mt-1 p-2 w-full border rounded-md"
                                    value="{{ $planMejoramiento->Fecha_inicial }}" readonly>
                            </div>

                            <div class="w-1/2 mr-2">
                                <label class="block text-sm font-medium text-gray-700">Fecha Final</label>
                                <input type="text" class="mt-1 p-2 w-full border rounded-md"
                                    value="{{ $planMejoramiento->Fecha_final }}" readonly>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Instructor Responsable</label>
                            <input type="text" class="mt-1 p-2 w-full border rounded-md"
                                value="{{ $planMejoramiento->Instructor_responsable }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Objetivo del Plan</label>
                            <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"
                                readonly>{{ $planMejoramiento->Objetivo_del_plan }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Indicadores de Desempeño</label>
                            <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"
                                readonly>{{ $planMejoramiento->Indicadores_de_desempeno }}</textarea>
                        </div>

                        <form action="{{ route('aprendiz_Views.plan_mejoramiento') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <div class="w-1/2 mr-2">
                                        <label class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" class="mt-1 p-2 w-full border rounded-md"
                                            placeholder="Ingrese el email" required>
                                        @error('email')
                                        <span class="text-red-500 text-sm my-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <div class="w-1/2 mr-2">
                                        <label class="block text-sm font-medium text-gray-700">Descripción</label>
                                        <input type="text" name="descripcion" class="mt-1 p-2 w-full border rounded-md"
                                            placeholder="Ingrese una descripción" required>
                                        @error('descripcion')
                                        <span class="text-red-500 text-sm my-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-1/2 mr-2">
                                        <label class="block text-sm font-medium text-gray-700">Subir Archivos</label>
                                        <input type="file" name="url_documento" class="mt-1" required>
                                        @error('url_documento')
                                        <span class="text-red-500 text-sm my-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-1/2 ml-2">
                                        <button type="submit"
                                            class="bg-green-700 hover:bg-green-500 py-1 px-1 ml-9 border-2 border-green-950 rounded transition duration-300 ease-in-out">Enviar
                                            Archivo</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Calificación del Documento</label>
                            <p class="mt-1 p-2 w-full border rounded-md">Calificación obtenida: Excelente</p>
                        </div>
                        <p class="text-sm text-gray-500">¡Mucha suerte en el proceso!</p>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <script>
                alert('{{ session('success') }}');
                window.location.href = '{{ route('aprendiz_Views.consultas') }}';
            </script>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <x-link href="{{ route('aprendiz_Views.consultas') }}"
                class="mx-3 mx-5 mb-6 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atrás</x-link>
        </div>
    </div>
</x-app-layout>