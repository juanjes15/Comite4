@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <p class="text-lg font-semibold mb-4">Te damos la bienvenida al Plan de Mejoramiento diseñado para ayudarte a alcanzar tus objetivos académicos y profesionales de manera efectiva.</p>
    
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Area</label>
        <input type="text" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="flex mb-4">
        <div class="w-1/2 mr-2">
            <label class="block text-sm font-medium text-gray-700">Fecha Inicial</label>
            <input type="date" class="mt-1 p-2 w-full border rounded-md">
        </div>
        <div class="w-1/2 ml-2">
            <label class="block text-sm font-medium text-gray-700">Fecha Final</label>
            <input type="date" class="mt-1 p-2 w-full border rounded-md">
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Instructor Responsable</label>
        <input type="text" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Objetivo del Plan</label>
        <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Indicadores de Desempeño</label>
        <textarea class="mt-1 p-2 w-full border rounded-md" rows="4"></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Subir Archivos</label>
        <input type="file" class="mt-1">
    </div>

    <p class="text-sm text-gray-500">Mucha suerte en el proceso.</p>
</div>
@endsection
