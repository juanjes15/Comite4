<x-app-layout>
    <div class="bg-green-50 shadow-x">
        <div class="max-w-3x1 mx-auto p-4 mt-10">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Citacion a comite') }}
                </h2>
            </x-slot>

            <body class="bg-gray-100">
                <div class="py-12 ">
                    <div class="relative overflow-x-auto sm:rounded-lg px-4 py-4 bg-green-50 shadow-xl">
                        <div class="container mx-auto p-4">
                            <div class="">
                            </div>
                            <div class="container mx-auto p-4 mt-8">
                                <h2 class="text-2xl font-semibold mb-4">Comités</h2>


                                <table class="shadow-2xl">
                                    <thead class="bg-gray-300">
                                        <tr>
                                            <th class="px-4 py-2">
                                                <div class="flex items-center">
                                                    <span class="mr-2">Solicitud ID</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <!-- Ícono, puedes personalizarlo según tus necesidades -->
                                                        <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th class="px-4 py-2">
                                                <div class="flex items-center">
                                                    <span class="mr-2">Acta</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th class="px-4 py-2">
                                                <div class="flex items-center">
                                                    <span class="mr-2">Estado</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th class="px-4 py-2">
                                                <div class="flex items-center">
                                                    <span class="mr-2">Fecha</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th class="px-4 py-2">
                                                <div class="flex items-center">
                                                    <span class="mr-2">Recomendación</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th class="px-4 py-2">
                                                <div class="flex items-center">
                                                    <span class="mr-2">Acciones</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comites as $comite)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $comite->sol_id }}</td>
                                            <td class="border px-4 py-2">{{ $comite->com_acta }}</td>
                                            <td class="border px-4 py-2">{{ $comite->com_estado }}</td>
                                            <td class="border px-4 py-2">{{ $comite->com_fecha }}</td>
                                            <td class="border px-4 py-2">{{ $comite->com_recomendacion }}</td>
                                            <td class="border px-4 py-2">

                                                <a href="{{ route('aprendiz_Views.plan_mejoramiento', ['id' => $comite->id]) }}"
                                                    class="bg-green-700 hover:bg-green-500 border-2 border-green-950  px-1 py-1 rounded flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs>
                                                            <path
                                                                d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-1-9.732L6.5 10.65l1.414-1.414L11 9.207l5.086-5.086L18.5 6.65 11 14.268z"
                                                                id="a" />
                                                        </defs>
                                                        <use fill="currentColor" xlink:href="#a" />
                                                    </svg>
                                                    <span>Plan de Mejoramiento</span>
                                                </a>

                                                <br>
                                                <a href="{{ route('aprendiz_Views.detalles', ['id' => $comite->id]) }}"
                                                    class="mb-6  mt-6 bg-green-700 hover:bg-yellow-500 px-1 py-1 rounded border-2  border-green-950
                                                flex items-center ml-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs>
                                                            <path
                                                                d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-2-8a2 2 0 114 0 2 2 0 01-4 0z"
                                                                id="a" />
                                                        </defs>
                                                        <use fill="currentColor" xlink:href="#a" />
                                                    </svg>
                                                    <span>Ver Detalles</span>
                                                </a>



                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <!-- En tu vista blade -->
                    @if(session('status') == 'success')
                    <!-- Agrega SweetAlert2 CSS y JS -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

                    <script>
                        // Muestra la alerta
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "{{ session('message') }}",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                            customClass: {
                                popup: 'bg-green-50 shadow-x',
                                content: 'text-green-800',
                                confirmButton: 'bg-green-700 hover:bg-green-500 border-2 border-green-950'
                            }
                        });
                    </script>

                    @endif

                </div>
        </div>
</x-app-layout>