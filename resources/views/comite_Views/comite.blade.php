<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Citación a comité') }}
        </h2>
    </x-slot>

    <div class="my-4">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="showAllModals()">Completar información de comité</button>
    </div>

    <div id="message-success" class="text-green-500 hidden"></div>
    <div id="error-message" class="text-red-500 hidden"></div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border border-gray-300 bg-gray-200">Estado</th>
                <th class="px-4 py-2 border border-gray-300 bg-gray-200">Acciones</th> <!-- Nuevo encabezado para acciones -->
            </tr>
        </thead>

        <tbody>
            @foreach($comites as $comite)
                <tr>
                <td class="px-4 py-2 border border-gray-300">{{ $comite->com_estado }}</td>
            <td class="px-4 py-2 border border-gray-300">
                <!-- Campos de selección, entrada y botón de guardar -->
                <select name="estado" id="estado-{{ $comite->id }}">
                    <option value="Terminado">Terminado</option>
                    <option value="Aplazado">Aplazado</option>
                </select>
                <input type="text" name="codigo" id="codigo-{{ $comite->id }}" placeholder="Código">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="guardarEstado({{ $comite->id }})">Guardar</button>
            </td>
        </tr>
                <div id="modal-{{ $comite->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="bg-white rounded-lg w-full max-w-md p-6">
                            <h3 class="text-lg font-medium text-green-600 mb-4">Completar Solicitud de Comité</h3>

                            <form method="post" action="{{ route('comite_Views.completar') }}" enctype="multipart/form-data" onsubmit="return enviarFormulario(this, {{ $comite->id }});">
                                @csrf
                                <div class="mb-4">
                                    <label for="com_codigo" class="block text-gray-700 text-sm font-bold">Código</label>
                                    <input type="text" name="com_codigo" class="border-2 border-gray-300 p-2 w-full" value="{{ $comite->codigo }}">
                                </div>
                                <div class="mb-4">
    <label for="plantilla_acta" class="block text-gray-700 text-sm font-bold">Plantilla del Acta</label>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="descargarPlantilla()">Descargar Plantilla</button>
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
                                    <button type="submit" class="bg-green-700 hover:bg-green-500 border-2 border-green-950 px-3 py-1 text-black rounded">
                                        <i class="fas fa-check-circle mr-1"></i> Enviar
                                    </button>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded ml-4" onclick="closeModal({{ $comite->id }})">Cancelar</button>
                                </div>
                                <!-- Mostrar mensajes de error o éxito -->
                                <div id="message-{{ $comite->id }}" class="mt-4 text-green-500 hidden"></div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <div id="message-modal" class="fixed z-10 inset-0 overflow-y-auto hidden"></div>

    <script>
        function showSuccessMessage(message) {
            var messageModal = document.getElementById("message-modal");
            var messageTitle = document.getElementById("message-title");
            var messageContent = document.getElementById("message-content");

            messageModal.classList.remove("hidden");
            messageTitle.textContent = "Éxito";
            messageContent.textContent = message;
        }

        function showErrorMessage(message) {
            var messageModal = document.getElementById("message-modal");
            var messageTitle = document.getElementById("message-title");
            var messageContent = document.getElementById("message-content");

            messageModal.classList.remove("hidden");
            messageTitle.textContent = "Error";
            messageContent.textContent = message;
        }

        function showAllModals() {
            // Muestra el modal para todas las solicitudes
            @foreach($comites as $comite)
                showModal({{ $comite->id }});
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
            var errorMessage = document.getElementById("error-message");

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
                        var successMessage = document.getElementById("message-success");
                        successMessage.textContent = "Registro enviado correctamente";
                        successMessage.classList.remove("hidden");
                    } else if (data.error) {
                        errorMessage.textContent = data.error;
                        errorMessage.classList.remove("hidden");
                        submitButton.disabled = false;
                    }
                })
                .catch(error => {
                    submitButton.disabled = false;
                });

            return false;
        }
        function guardarEstado(id) {
        var estadoSelect = document.getElementById("estado-" + id);
        var codigoInput = document.getElementById("codigo-" + id);
        var errorMessage = document.getElementById("error-message");

        var formData = new FormData();
        formData.append('id', id);
        formData.append('estado', estadoSelect.value);
        formData.append('codigo', codigoInput.value);

        fetch('{{ route('comite_Views.updateEstado') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                var successMessage = document.getElementById("message-success");
                successMessage.textContent = "Estado actualizado correctamente";
                successMessage.classList.remove("hidden");

                // Limpiar los campos después de una operación exitosa
            estadoSelect.value = '';
            codigoInput.value = '';
            } else if (data.error) {
                errorMessage.textContent = data.error;
                errorMessage.classList.remove("hidden");
            }
        })
        .catch(error => {
            errorMessage.textContent = "Error al actualizar el estado";
            errorMessage.classList.remove("hidden");
        });
    }
    function descargarPlantilla() {
    // Puedes ajustar la ruta de la plantilla según tu estructura de archivos
    var plantillaUrl = '/descargas/acta_comite.docx';
var encodedUrl = encodeURIComponent(plantillaUrl);

fetch(encodedUrl)
    .then(response => response.blob())
        .then(blob => {
            // Crear un enlace temporal para descargar el archivo
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'acta_comite.docx';
            link.target = '_blank';

            // Simular un clic en el enlace para iniciar la descarga
            link.click();
        })
        .catch(error => console.error('Error al descargar la plantilla:', error));
}


    </script>

    <br>
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

@if(session('status') == 'success')
    <!-- Agrega SweetAlert2 CSS y JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        // Muestra la alerta
        Swal.fire({
            title: "¡Error!",
            text: "{{ session('message') }}",
            icon: "error",
            confirmButtonText: "Aceptar",
            customClass: {
                popup: 'bg-green-50 shadow-x',
                content: 'text-green-800',
                confirmButton: 'bg-green-700 hover:bg-green-500 border-2 border-green-950'
            }
        });
    </script>
    
@endif
    <x-link href="{{ route('aprendiz_Views.consultas') }}" class="mx-3 mx-5 mb-6 bg-green-700 hover:bg-red-800 border-2 border-green-950">Atras</x-link>
</x-app-layout>
