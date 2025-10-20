<x-app-layout>
    <div class="max-w-2xl mx-auto p-8">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Bank Transfer Details</h1>
            <p class="text-lg text-gray-700 text-center mb-8">
                To confirm your order, please complete your bank transfer and upload the transfer slip below.
            </p>

            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Bank Information</h2>
                <ul class="text-gray-600 list-inside space-y-2">
                    <li><strong>Bank Name:</strong> Your Bank Name</li>
                    <li><strong>Account Number:</strong> 1234567890</li>
                    <li><strong>Account Holder:</strong> Your Account Name</li>
                    <li><strong>IFSC Code:</strong> ABCD1234</li>
                </ul>
            </div>

            <form method="POST" action="{{ route('upload.slip') }}" enctype="multipart/form-data">
                @csrf
                <label class="block text-lg font-medium text-gray-800 mb-4 text-left">
                    Upload Bank Transfer Slip
                </label>

                <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-8" id="dropzone">
                    <input type="file" id="file-upload" name="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />

                    <div class="text-center">
                        <img class="mx-auto h-16 w-16 mb-4" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="Upload Icon">

                        <h3 class="text-lg font-medium text-gray-800 mb-2">
                            Drag and drop your file here, or <span class="text-blue-500">browse</span>
                        </h3>
                        <p class="text-gray-500 text-sm">
                            PNG, JPG, or GIF files up to 10MB
                        </p>
                    </div>

                    <img src="" class="mt-6 mx-auto max-h-40 hidden" id="preview">
                </div>

                <button type="submit" class="mt-8 w-full bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition duration-200">
                    Upload Bank Slip
                </button>
            </form>
        </div>
    </div>

    <script>
        var dropzone = document.getElementById('dropzone');

        dropzone.addEventListener('dragover', e => {
            e.preventDefault();
            dropzone.classList.add('border-blue-500');
        });

        dropzone.addEventListener('dragleave', e => {
            e.preventDefault();
            dropzone.classList.remove('border-blue-500');
        });

        dropzone.addEventListener('drop', e => {
            e.preventDefault();
            dropzone.classList.remove('border-blue-500');
            var file = e.dataTransfer.files[0];
            displayPreview(file);
        });

        var input = document.getElementById('file-upload');

        input.addEventListener('change', e => {
            var file = e.target.files[0];
            displayPreview(file);
        });

        function displayPreview(file) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.classList.remove('hidden');
            };
        }
    </script>
</x-app-layout>
