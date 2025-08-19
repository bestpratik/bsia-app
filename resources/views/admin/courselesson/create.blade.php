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
            Add Course Lesson
        </h2>
        <a href="{{ route('courselessons') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>

        <form class="bg-white w-full space-y-4" method="post" action="{{ route('save.courselessons') }}"
            enctype="multipart/form-data">
            @csrf

            <!-- Course Module ID -->
            <div>
                <label class="block">Course Module ID<span class="text-red-700">*</span></label>
                <select name="course_module_id" class="w-full mt-1 p-2 border rounded">
                    <option value="">Select Course Module</option>
                    @foreach ($coursemod as $row)
                        <option value="{{ $row->id }}" {{ old('course_module_id') == $row->id ? 'selected' : '' }}>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_module_id')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Title -->
            <div>
                <label class="block">Title<span class="text-red-700">*</span></label>
                <input name="title" type="text" class="w-full mt-1 p-2 border rounded" placeholder="Enter Title">
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Type -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Type</span></label>
                <select name="type" id="lessonType" class="w-full mt-1 p-2 border rounded">
                    <option value="">-- Select Type --</option>
                    <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                    <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                    <option value="quiz" {{ old('type') == 'quiz' ? 'selected' : '' }}>Quiz</option>
                    <option value="downloadable" {{ old('type') == 'downloadable' ? 'selected' : '' }}>Downloadable</option>
                </select>
            </div>

            <!-- Content -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Content</span>
                    <textarea name="content" id="" rows="5" class="w-full mt-1 p-2 border rounded summernote"
                        placeholder="Enter Content">{{ old('content') }}</textarea>
                </label>
            </div>

            <!-- Video URL -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Video URL</span>
                <input type="text" name="video_url" value="{{ old('video_url') }}"
                    class="w-full mt-1 p-2 border rounded" placeholder="https://youtube.com/...">
                </label>
            </div>

            <!-- Downloadable File -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Upload File</span>
                <input type="file" name="downloadable_file" accept=".pdf,.doc,.docx,.xls,.xlsx,.csv,.txt,.zip,.rar,.ppt,.pptx" class="w-full mt-1 p-2 border rounded">
            </label>
            </div>

            <!-- Order No -->
            <div>
                <label class="block">Order No</label>
                <input name="order_no" type="number" class="w-full mt-1 p-2 border rounded"
                    placeholder="Enter Order No">
            </div>

            {{-- <!-- Status -->
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1"
                        {{ old('status', $courselesson->status ?? false) ? 'checked' : '' }} class="mr-2">
                    Active
                </label>
            </div> --}}

            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Submit</button>
        </form>
</x-app-layout>

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
