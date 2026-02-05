

document.addEventListener('DOMContentLoaded', function() {

    const fileInput = document.getElementById('imagen');
    const dropzonePrompt = document.getElementById('dropzone-prompt');
    const previewDiv = document.getElementById('dropzone-preview');
    const previewImg = document.getElementById('preview-img');
    const dropzoneContainer = document.getElementById('dropzone');

    function handleFile(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImg.src = event.target.result;
                previewDiv.classList.remove('hidden');
                previewDiv.classList.add('flex');
                dropzonePrompt.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    fileInput.addEventListener('change', function(e) {
    handleFile(e.target.files[0]);
    });

    fileInput.addEventListener('dragenter', () => dropzoneContainer.classList.add('border-orange-500', 'bg-orange-50'));
    fileInput.addEventListener('dragleave', () => dropzoneContainer.classList.remove('border-orange-500', 'bg-orange-50'));
    fileInput.addEventListener('drop', (e) => {
        dropzoneContainer.classList.remove('border-orange-500', 'bg-orange-50');
        if (e.dataTransfer.files.length > 0) {
            handleFile(e.dataTransfer.files[0]);
        }
    });

});
