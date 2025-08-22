<x-app-layout>
    @if ($success = Session::get('success'))
        <div class="alert alert-success alert-dismissible max-w-4xl mx-auto">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            {{ $success }}
        </div>
    @endif
    <div
        class="bg-white border rounded-lg col-span-2 mt-4 p-8 flex flex-wrap align-center justify-between max-w-4xl mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 m-0">
            Add Course
        </h2>
        <a href="{{ route('course') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>

        <form class="bg-white w-full space-y-4" method="post" action="{{ route('save.course') }}"
            enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div>
                <label class="block">Title<span class="text-red-700">*</span></label>
                <input name="title" type="text" class="w-full mt-1 p-2 border rounded" placeholder="Enter Title">
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Short Description -->
            <div>
                <label class="block">Short Description</label>
                <textarea name="short_description" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ old('short_description') }}</textarea>
            </div>

            <!-- About Course -->
            <div>
                <label class="block">About Course</label>
                <textarea name="about_course" rows="4" class="w-full mt-1 p-2 border rounded summernote">{{ old('about_course') }}</textarea>
            </div>

            <!-- Why Join -->
            <div>
                <label class="block">Why Join The Course</label>
                <textarea name="why_join_the_course" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ old('why_join_the_course') }}</textarea>
            </div>

            <!-- Instructor Info -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block">Instructor Name</label>
                    <input name="instructor_name" type="text" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Instructor Name">
                </div>
                <div>
                    <label class="block">Instructor Designation</label>
                    <input name="instructor_designation" type="text" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Instructor Designation">
                </div>
            </div>

            <div>
                <label class="block">Instructor Details</label>
                <textarea name="instructor_details" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ old('instructor_details') }}</textarea>
            </div>

            <!-- Pricing -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block">MRP<span class="text-red-700">*</span></label>
                    <input name="mrp" type="number" class="w-full mt-1 p-2 border rounded" placeholder="Enter MRP">
                    @error('mrp')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                </div>
                <div>
                    <label class="block">Sellable Price<span class="text-red-700">*</span></label>
                    <input name="sellable_price" type="number" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Sellable Price">
                        @error('sellable_price')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                </div>
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
                    src="{{ isset($course) && $course->featured_image ? asset($course->featured_image) : '' }}"
                    class="mt-2 border rounded"
                    style="height: 50px; width: 75px; {{ isset($course) && $course->featured_image ? '' : 'display: none;' }}">
            </div>

            <!-- Certificate Upload -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Certificate File</span>
                    <input id="pdfInput" name="certificate_file" type="file" accept="application/pdf"
                        class="w-full mt-1 p-2 border rounded" onchange="previewPdf(event)">
                </label>

                <!-- Preview PDF Name -->
                <div id="pdfPreview" class="mt-2 text-sm text-gray-700" style="display: none;">
                    <span class="font-semibold">Selected PDF:</span> <span id="pdfFileName"></span>
                </div>
            </div>

            <!-- Language -->
            <div>
                <label class="block">Language</label>
                <input name="language" type="text" class="w-full mt-1 p-2 border rounded"
                    placeholder="Enter Language">
            </div>

            <!-- Order No -->
            <div>
                <label class="block">Order No<span class="text-red-700">*</span></label>
                <input name="order_no" type="number" class="w-full mt-1 p-2 border rounded"
                    placeholder="Enter Order No">
                    @error('order_no')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Checkboxes -->
            <div class="grid grid-cols-2 gap-4 mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_popular" value="1"
                        {{ old('is_popular', $course->is_popular ?? false) ? 'checked' : '' }} class="mr-2">
                    Popular Course
                </label>

                <label class="inline-flex items-center">
                    <input type="checkbox" name="show_on_home" value="1"
                        {{ old('show_on_home', $course->show_on_home ?? false) ? 'checked' : '' }} class="mr-2">
                    Show on Home
                </label>

                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_certificate" value="1"
                        {{ old('is_certificate', $course->is_certificate ?? false) ? 'checked' : '' }} class="mr-2">
                    Provides Certificate
                </label>

                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1"
                        {{ old('status', $course->status ?? false) ? 'checked' : '' }} class="mr-2">
                    Active
                </label>
            </div>
            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Submit</button>
        </form>
</x-app-layout>

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

<script>
    function previewPdf(event) {
        const input = event.target;
        const fileNameDisplay = document.getElementById('pdfFileName');
        const previewWrapper = document.getElementById('pdfPreview');

        if (input.files && input.files[0]) {
            fileNameDisplay.textContent = input.files[0].name;
            previewWrapper.style.display = 'block';
        } else {
            previewWrapper.style.display = 'none';
            fileNameDisplay.textContent = '';
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
