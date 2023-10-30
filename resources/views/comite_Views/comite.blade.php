<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Citación a comité') }}
        </h2>
    </x-slot>
    <div class="my-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showAllModals()">Completar información de comité</button>
    </div>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border border-gray-300 bg-gray-200">Fecha</th>
                <th class="px-4 py-2 border border-gray-300 bg-gray-200">Estado</th>
                <th class="px-4 py-2 border border-gray-300 bg-gray-200">Lugar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr>
                <td class="px-4 py-2 border border-gray-300">{{ $solicitud->sol_fecha }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $solicitud->sol_estado }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $solicitud->sol_lugar }}</td>
            </tr>
            <div id="modal-{{ $solicitud->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="bg-white rounded-lg w-full max-w-md p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Completar Solicitud de Comité</h3>
                        <form method="post" action="{{ route('comite_Views.completar') }}" enctype="multipart/form-data" onsubmit="return enviarFormulario(this, {{ $solicitud->id }});">
                            @csrf
                            <input type="hidden" name="sol_id" value="{{ $solicitud->id }}">
                            <div class="mb-4">
                                <label for="com_codigo" class="block text-gray-700 text-sm font-bold">Código</label>
                                <input type="text" name="com_codigo" class="border-2 border-gray-300 p-2 w-full" required>
                            </div>
                            <div class="mb-4">
                                <label for="com_acta" class="block text-gray-700 text-sm font-bold">Subir Acta</label>
                                <input type="file" name="com_acta" class="border-2 border-gray-300 p-2 w-full" required>
                            </div>
                            <div class="mb-4">
                                <label for="com_recomendacion" class="block text-gray-700 text-sm font-bold">Recomendación</label>
                                <textarea name="com_recomendacion" class="border-2 border-gray-300 p-2 w-full" required></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-green-700 hover-bg-green-500 border-2 border-green-950 px-3 py-1 text-black rounded ">
                                    <i class="fas fa-check-circle mr-1"></i> Enviar
                                </button>
                                <button type="button"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded ml-4"
                                    onclick="closeModal({{ $solicitud->id }})">Cancelar</button>
                            </div>
                            <!-- Mostrar mensajes de error o éxito -->
                            <div id="message-{{ $solicitud->id }}" class="mt-4 text-green-500 hidden"></div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    <script>
        function showAllModals() {
            // Muestra el modal para todas las solicitudes
            @foreach($solicitudes as $solicitud)
                showModal({{ $solicitud->id }});
            @endforeach
        }

        function showModal(id) {
            var modal = document.getElementById("modal-" + id);
            modal.classList.remove("hidden");
            modal.classList.add("block");
        }

        function closeModal(id) {
            var modal = document.getElementById("modal-" + id);
            modal.classList.remove("block");
            modal.classList.add("hidden");
        }

        function enviarFormulario(form, id) {
            var modal = document.getElementById("modal-" + id);
            var submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            var formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    modal.classList.add("hidden");
                    var successMessage = document.createElement('div');
                    successMessage.innerHTML = "Registro enviado correctamente";
                    successMessage.classList.add("text-green-500");
                    form.appendChild(successMessage);
                } else if (data.error) {
                    alert(data.error);
                    submitButton.disabled = false;
                }
            })
            .catch(error => {
                submitButton.disabled = false;
            });

            return false;
        }
    </script>
</x-app-layout>
