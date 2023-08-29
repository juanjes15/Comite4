<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Subir Archivo</h2>
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
    </form>
    @if(session('message'))
        <div class="bg-green-200 text-green-800 mt-4 px-4 py-2 rounded">{{ session('message') }}</div>
    @endif
</div>

<div class="container mx-auto p-4 mt-8">
    <h2 class="text-2xl font-semibold mb-4">Comités</h2>
    <table class="table-auto w-full border-collapse">
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
            </tr>
        </thead>
        <tbody>
            @foreach($comites as $comite)
                <tr>
                    <td class="border px-4 py-2">{{ $comite->com_acta }}</td>
                    <td class="border px-4 py-2">{{ $comite->com_estado }}</td>
                    <td class="border px-4 py-2">{{ $comite->com_fecha }}</td>
                    <td class="border px-4 py-2">{{ $comite->com_recomendacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
