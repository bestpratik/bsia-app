<x-app-layout>
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible max-w-4xl mx-auto">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            {{ $message }}
        </div>
    @endif
    <div
        class="bg-white border rounded-lg col-span-2 mt-4 p-8 flex flex-wrap align-center justify-between max-w-4xl mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 m-0">
            Add Quiz
        </h2>
        <a href="{{ url('quizzes') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>
        <form class="bg-white w-full space-y-4" method="post" action="{{ route('quizzes.store') }}"
            enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div>
                <label class="block">Question
                    <input name="question" type="text" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Question">
                    @if ($errors->has('question'))
                        <span class="mt-1 text-sm text-red-500">{{ $errors->first('question') }}</span>
                    @endif
                </label>
            </div>
            <!-- End Title -->

            <div>
                <label class="block">
                    <span class="text-gray-700">Option One</span>
                    <textarea name="option_one" id="" rows="5" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Option One">{{ old('option_one') }}</textarea>
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Option Two</span>
                    <textarea name="option_two" id="" rows="5" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Option Two">{{ old('option_two') }}</textarea>
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Option Three</span>
                    <textarea name="option_three" id="" rows="5" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Option Three">{{ old('option_three') }}</textarea>
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Option Four</span>
                    <textarea name="option_four" id="" rows="5" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Option Four">{{ old('option_four') }}</textarea>
                </label>
            </div>


            <!-- Description -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Correct Answer</span>
                    <textarea name="correct_answer" id="" rows="5" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Correct Answer">{{ old('correct_answer') }}</textarea>
                </label>
            </div>

            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Submit</button>
        </form>
    </div>

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
