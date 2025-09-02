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
            Edit Ebook
        </h2>
        <a href="{{ route('ebook') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4"/>
        </a>

        <form class="bg-white w-full space-y-4" method="post" action="{{ route('update.ebook', $ebook->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Title -->
            <div>
                <label class="block">Title<span class="text-red-700">*</span></label>
                <input name="title" type="text" value="{{ $ebook->title ?? '' }}" class="w-full mt-1 p-2 border rounded"
                    placeholder="Enter Title">
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block">Description</label>
                <textarea name="description" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ $ebook->description ?? '' }}</textarea>
            </div>
            
            <!-- Pricing -->
                <div>
                    <label class="block">Price</label>
                    <input name="price" type="number" value="{{ $ebook->price ?? '' }}"
                        class="w-full mt-1 p-2 border rounded">
                </div>

            <!-- Author -->
                <div>
                    <label class="block">Author</label>
                    <input name="author" type="text" value="{{ $ebook->author ?? '' }}"
                        class="w-full mt-1 p-2 border rounded">
                </div>

            <!-- Featured Image -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Featured Image</span>
                    <input name="featured_image" type="file" onchange="loadFile(event)"
                        class="w-full mt-1 p-2 border rounded">
                </label>
                <div class="shrink-0">
                    <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                        src="{{ asset('uploads/' . $ebook->featured_image) }}" alt="Current photo" />
                </div>
            </div>

            <!-- Checkboxes -->
            <div class="grid grid-cols-2 gap-4 mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1"
                        {{ old('status', $ebook->status ?? false) ? 'checked' : '' }} class="mr-2">
                    Active
                </label>
            </div>
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
    var loadFile = function(event) {

        var input = event.target;
        var file = input.files[0];
        var type = file.type;

        var output = document.getElementById('preview_img');


        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
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
