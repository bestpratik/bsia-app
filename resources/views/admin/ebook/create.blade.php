<x-app-layout>
    @if ($success = Session::get('success'))
        <div class="alert alert-success alert-dismissible max-w-4xl mx-auto">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            {{ $success }}
        </div>
    @endif
    <div
        class="bg-white border rounded-lg col-span-2 mt-4 p-8 flex flex-wrap align-center justify-between max-w-7xl mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 m-0">
            Add Ebook
        </h2>
        <a href="{{ route('ebook') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>

        <form class="bg-white w-full space-y-4" method="post" action="{{ route('save.ebook') }}"
            enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div>
                <label class="block">Title<span class="text-red-700">*</span></label>
                <input name="title" type="text" class="w-full mt-1 p-2 border rounded" placeholder="Enter Title" value="{{ old('title') }}">
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block">Description</label>
                <textarea name="description" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ old('description') }}</textarea>
            </div>

            <!-- Pricing -->
            <div>
                <label class="block">Price<span class="text-red-700">*</span></label>
                <input name="price" type="number" class="w-full mt-1 p-2 border rounded" placeholder="Enter Price" value="{{ old('price') }}">
                @error('price')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Author -->
            <div>
                <label class="block">Author</label>
                <input name="author" type="text" class="w-full mt-1 p-2 border rounded" placeholder="Enter Author" value="{{ old('author') }}">
            </div>

            <!-- Featured Image -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Featured Image</span>
                    <input id="imageInput" name="featured_image" type="file" class="w-full mt-1 p-2 border rounded"
                        onchange="previewImage(event)">
                </label>

                <!-- Preview Image -->
                <img id="preview"
                    src="{{ isset($ebook) && $ebook->featured_image ? asset($ebook->featured_image) : '' }}"
                    class="mt-2 border rounded"
                    style="height: 50px; width: 75px; {{ isset($ebook) && $ebook->featured_image ? '' : 'display: none;' }}">
            </div>

            <!-- Checkboxes -->
            <!-- <div class="grid grid-cols-2 gap-4 mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1"
                        {{ old('status', $ebook->status ?? false) ? 'checked' : '' }} class="mr-2">
                    Active
                </label>
            </div> -->
            
            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Submit</button>
        </form>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusCheckbox = document.querySelector('input[name="status"]');
        if (!statusCheckbox.checked) {
            statusCheckbox.checked = true;
        }
    });
</script>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- Summernote) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<!-- Summernote) -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 50,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
