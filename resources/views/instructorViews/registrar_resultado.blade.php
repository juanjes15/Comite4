<x-app-layout>    
<div class="max-w-6xl mx-auto p-6 mt-14">
    <div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registar resultado plan') }}
        </h2>
    </x-slot>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Calificación</label>
            <select name="estado" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400">
                <option value="" selected disabled>Agregue la calificación.</option>
                <option value="aprobado">Aprobado</option>
                <option value="desaprobado">Desaprobado</option>
             </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Observaciones</label>
            <textarea class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-400" rows="4"></textarea>
        </div>
    </div>
    <x-link id="registrarResultadoLink" href="#" class="mx-3">Registrar Resultado</x-link>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Selecciona el enlace por su ID
            var registrarResultadoLink = document.getElementById("registrarResultadoLink");
            // Agrega un evento click al enlace
            registrarResultadoLink.addEventListener("click", function(e) {
                e.preventDefault(); // Previene el comportamiento predeterminado del enlace (navegar a otra página)

                // Muestra una alerta con el mensaje de éxito
                alert("¡Resultado registrado con éxito!");
            });
        });
    </script>
    <x-link href="{{ url()->previous() }}" class="mx-3">Cancelar</x-link>
</x-app-layout>