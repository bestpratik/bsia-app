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
            Edit Course
        </h2>
        <a href="{{ route('course') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4"/>
        </a>

        <form class="bg-white w-full space-y-4" method="post" action="{{ route('update.course', $course->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Title -->
            <div>
                <label class="block">Title<span class="text-red-700">*</span></label>
                <input name="title" type="text" value="{{ $course->title ?? '' }}" class="w-full mt-1 p-2 border rounded"
                    placeholder="Enter Title">
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Short Description -->
            <div>
                <label class="block">Short Description</label>
                <textarea name="short_description" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ $course->short_description ?? '' }}</textarea>
            </div>

            <!-- About Course -->
            <div>
                <label class="block">About Course</label>
                <textarea name="about_course" rows="4" class="w-full mt-1 p-2 border rounded summernote">{{ $course->about_course ?? '' }}</textarea>
            </div>

            <!-- Why Join -->
            <div>
                <label class="block">Why Join The Course</label>
                <textarea name="why_join_the_course" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ $course->why_join_the_course ?? '' }}</textarea>
            </div>

            <!-- Instructor Info -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block">Instructor Name</label>
                    <input name="instructor_name" type="text" value="{{ $course->instructor_name ?? '' }}"
                        class="w-full mt-1 p-2 border rounded">
                </div>
                <div>
                    <label class="block">Instructor Designation</label>
                    <input name="instructor_designation" type="text" value="{{ $course->instructor_designation ?? '' }}"
                        class="w-full mt-1 p-2 border rounded">
                </div>
            </div>

            <div>
                <label class="block">Instructor Details</label>
                <textarea name="instructor_details" rows="3" class="w-full mt-1 p-2 border rounded summernote">{{ $course->instructor_details ?? '' }}</textarea>
            </div>

            <!-- Pricing -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block">MRP</label>
                    <input name="mrp" type="number" value="{{ $course->mrp ?? '' }}"
                        class="w-full mt-1 p-2 border rounded">
                        @error('mrp')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                </div>
                <div>
                    <label class="block">Sellable Price</label>
                    <input name="sellable_price" type="number" value="{{ $course->sellable_price ?? '' }}"
                        class="w-full mt-1 p-2 border rounded">
                        @error('sellable_price')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                </div>
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
                        src="{{ asset('uploads/' . $course->featured_image) }}" alt="Current photo" />
                </div>
            </div>

            <!-- Certificate Upload -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Certificate File</span>
                    <input name="certificate_file" type="file" accept="application/pdf"
                        class="w-full mt-1 p-2 border rounded" onchange="previewPdf(event)">
                </label>

                @if ($course->certificate_file)
                    <div class="mt-2 text-sm text-gray-700">
                        <span class="font-semibold">Current File:</span>
                        <a href="{{ asset('uploads/' . $course->certificate_file) }}" target="_blank"
                            class="text-blue-600 underline">
                            View Course PDF
                        </a>
                    </div>
                @endif
            </div>

            <!-- Language -->
            <div>
                <label class="block">Language</label>
                <input name="language" type="text" value="{{ $course->language ?? '' }}"
                    class="w-full mt-1 p-2 border rounded" placeholder="Enter Language">
            </div>

            <!-- Order No -->
            <div>
                <label class="block">Order No</label>
                <input name="order_no" type="number" value="{{ $course->order_no ?? '' }}"
                    class="w-full mt-1 p-2 border rounded">
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
