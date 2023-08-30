<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Citacion a comite') }}
        </h2>
    </x-slot>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Anexar pruebas</h2>
    <form>

        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Descripción:</label>
            <textarea name="descripcion" class="form-input mt-1 w-full rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Archivo:</label>
            <input type="file" name="archivo" class="form-input mt-1 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center">
            <span class="mr-2">Subir Archivo</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform rotate-180" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 4a1 1 0 011-1h8a1 1 0 011 1v2a1 1 0 11-2 0V5H6v10h5a1 1 0 110 2H6a1 1 0 01-1-1V4z" clip-rule="evenodd" />
                <path d="M9 13a1 1 0 001 1h6a1 1 0 100-2H10a1 1 0 00-1 1z" />
            </svg>
        </button>
        <br>
        <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 flex items-center">
            <span class="mr-2">Cancelar</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 4a1 1 0 011-1h8a1 1 0 011 1v2a1 1 0 11-2 0V5H6v10h5a1 1 0 110 2H6a1 1 0 01-1-1V4z" clip-rule="evenodd" />
                <path d="M9 13a1 1 0 001 1h6a1 1 0 100-2H10a1 1 0 00-1 1z" />
            </svg>
        </button>
    </form>
    <div class="flex justify-center mt-2"> 
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 flex items-center">
    <span class="mr-2">Enviar Información</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 2a2 2 0 0 1 2 2v6a1 1 0 0 1-2 0V4a1 1 0 0 0-1-1H4a1 1 0 0 1 0-2h5a2 2 0 0 1 0 4H7v6a2 2 0 1 1-4 0V4a4 4 0 0 1 4-4h5a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4v-6a2 2 0 0 1 0-4z"/>
    </svg>
</button>

    <div class="flex justify-center mt-2"> 
    
</div>
    @if(session('message'))
        <div class="bg-green-200 text-green-800 mt-4 px-4 py-2 rounded">{{ session('message') }}</div>
    @endif
</div>

<div class="container mx-auto p-4 mt-8">
    <h2 class="text-2xl font-semibold mb-4">Comités</h2>
    <table class="shadow-2xl">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2">
                    <div class="flex items-center">
                        <span class="mr-2">Acta</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex items-center">
                        <span class="mr-2">Estado</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex items-center">
                        <span class="mr-2">Fecha</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex items-center">
                        <span class="mr-2">Recomendación</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex items-center">
                        <span class="mr-2">Acciones</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1z" />
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($comites as $comite)
    <tr>
        <td class="border px-4 py-2">{{ $comite->com_acta }}</td>
        <td class="border px-4 py-2">{{ $comite->com_estado }}</td>
        <td class="border px-4 py-2">{{ $comite->com_fecha }}</td>
        <td class="border px-4 py-2">{{ $comite->com_recomendacion }}</td>
        <td class="border px-4 py-2">
            
        <a href="{{ route('Plan_mejoramientoViews.index', ['id' => $comite->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-1-9.732L6.5 10.65l1.414-1.414L11 9.207l5.086-5.086L18.5 6.65 11 14.268z" id="a"/>
        </defs>
        <use fill="currentColor" xlink:href="#a"/>
    </svg>
    <span>Plan de Mejoramiento</span>
</a>

<br>
<a href="" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 flex items-center ml-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-2-8a2 2 0 114 0 2 2 0 01-4 0z" id="a"/>
        </defs>
        <use fill="currentColor" xlink:href="#a"/>
    </svg>
    <span>Ver Detalles</span>
</a>



        </td>
    </tr>
@endforeach
        </tbody>
    </table>
</div>
</x-app-layout>