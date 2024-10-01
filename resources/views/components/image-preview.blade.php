<div>
    <label><b>{{ $title }}</b></label> <!-- Aquí se muestra el título -->
    <div id="imagePreviewContainer">
        <img id="imagePreview" src="{{ $imageUrl }}" alt="Vista previa de la imagen"
            style="width: 100px; height: auto; display: {{ $imageUrl ? 'block' : 'none' }};">
    </div>
    <script>
        function previewImage(url) {
            const imagePreview = document.getElementById("imagePreview");
            imagePreview.src = url;
            imagePreview.style.display = "block";
        }

        // Ejemplo de cómo actualizar la URL con jQuery en el método change usando una función flecha
        $('#yourInputField').on('change', () => {
            const newImageUrl = 'URL_DE_TU_IMAGEN'; // Aquí puedes obtener la nueva URL
            previewImage(newImageUrl);
        });
    </script>
</div>
