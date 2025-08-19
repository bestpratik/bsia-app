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
            Edit Course Module
        </h2>
        <a href="{{ route('coursemodules') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>

        <form class="bg-white w-full space-y-4" method="post"
            action="{{ route('update.coursemodules', $coursemod->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Title -->
            <div>
                <label class="block">Name<span class="text-red-700">*</span></label>
                <input name="name" type="text" value="{{ $coursemod->name }}"
                    class="w-full mt-1 p-2 border rounded" placeholder="Enter Name">
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Course ID -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Course ID</span></label>
                <select name="course_id" class="w-full mt-1 p-2 border rounded">
                    <option value="">Select Course</option>
                    @foreach ($course as $row)
                        <option value="{{ $row->id }}" {{ $coursemod->course_id == $row->id ? 'selected' : '' }}>
                            {{ $row->title }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Description</span>
                    <textarea name="description" id="" rows="5" class="w-full mt-1 p-2 border rounded summernote"
                        placeholder="Enter Description">{{ $coursemod->description }}</textarea>
                </label>
            </div>

            <!-- Order No -->
            <div>
                <label class="block">Order No</label>
                <input name="order_no" type="number" value="{{ $coursemod->order_no }}"
                    class="w-full mt-1 p-2 border rounded">
            </div>

            <!-- Status -->
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1"
                        {{ old('status', $coursemod->status ?? false) ? 'checked' : '' }} class="mr-2">
                    Active
                </label>
            </div>

            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Submit</button>
        </form>
</x-app-layout>

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
