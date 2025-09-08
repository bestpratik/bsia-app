<x-app-layout>
    <div class="max-w-7xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-book-open class="w-8 h-8 text-blue-600" />
                {{ $module->name ?? '' }}
            </h2>
            <a href="{{ route('course') }}"
                class="mt-4 sm:mt-0 px-5 py-2.5 text-sm font-medium text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg transition duration-200">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline-block" /> Back to List
            </a>
        </div>

        <!-- Details Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Name -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Module Name</p>
                <p class="text-lg font-semibold text-gray-800">{{ $module->name ?? 'N/A' }}</p>
            </div>

            <!-- Order No -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Order No</p>
                <p class="text-gray-800">{{ $module->order_no ?? 'N/A' }}</p>
            </div>

            <!-- Description -->
            <div class="md:col-span-2 p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Description</p>
                <p class="text-gray-700 leading-relaxed">
                    {!! $module->description ?? 'N/A' !!}
                </p>
            </div>

            <!-- Status -->
            <!-- <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Status</p>
                <span
                    class="px-3 py-1 text-sm font-medium rounded-full 
                    {{ $module->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $module->status ? 'Active' : 'Inactive' }}
                </span>
            </div> -->

            <!-- Lessons Section -->
            <div class="mb-10">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                        <x-heroicon-o-list-bullet class="w-6 h-6 text-purple-600" /> Lessons
                    </h3>
                    <button onclick="openLessonModal({{ $module->id }})"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                        <x-heroicon-o-plus class="w-4 h-4" /> Add Lesson
                    </button>
                </div>
                <ul class="space-y-3">
                    @forelse ($courseLesson as $row)
                    <li class="flex justify-between items-center bg-gray-50 p-4 rounded-lg border hover:shadow-sm transition">
                        <a href="{{ route('show.courselessons', $row->id) }}" class="font-medium text-blue-600 hover:underline">
                            {{ $row->title }}
                        </a>
                        <div class="flex gap-2">
                            <a href="{{ route('show.courselessons', $row->id) }}"
                                class="p-2 rounded-md hover:bg-green-100 text-green-600"
                                title="View">
                                <x-heroicon-o-eye class="w-5 h-5" />
                            </a>
                            <button onclick="editLesson({{ $module->id }}, {{ $row->id }}, `{{ addslashes($row->title) }}`, `{{ $row->type }}`, `{{ addslashes($row->content ?? '') }}`, `{{ $row->video_url ?? '' }}`, `{{ $row->order_no ?? '' }}`, `{{ $row->downloadable_file ?? '' }}`)"
                                class="p-2 rounded-md hover:bg-yellow-100 text-yellow-600"
                                title="Edit">
                                <x-heroicon-o-pencil-square class="w-5 h-5" />
                            </button>
                            <button onclick="deleteLesson({{ $row->id }})"
                                class="p-2 rounded-md hover:bg-red-100 text-red-600"
                                title="Delete">
                                <x-heroicon-o-trash class="w-5 h-5" />
                            </button>
                        </div>
                    </li>
                    @empty
                    <li class="text-gray-600">No lessons available.</li>
                    @endforelse
                </ul>
            </div>

            <!-- Quiz Section -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                        <x-heroicon-o-clipboard-document-check class="w-6 h-6 text-blue-600" /> Quizzes
                    </h3>
                    <button onclick="openQuizModal({{ $module->id }})"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <x-heroicon-o-plus class="w-4 h-4" /> Add Quiz
                    </button>
                </div>
                <ul class="space-y-3">
                    @forelse ($quiz as $row)
                    <li class="flex justify-between items-center bg-gray-50 p-4 rounded-lg border hover:shadow-sm transition">
                        <a href="{{ route('quizzes.show', $row->id) }}" class="font-medium text-blue-600 hover:underline">
                            {{ $row->question }}
                        </a>
                        <div class="flex gap-2">
                            <a href="{{ route('quizzes.show', $row->id) }}"
                                class="p-2 rounded-md hover:bg-green-100 text-green-600"
                                title="View">
                                <x-heroicon-o-eye class="w-5 h-5" />
                            </a>
                            <button onclick="openQuizModal({{ $module->id }}, {{ $row->id }})"
                                class="p-2 rounded-md hover:bg-yellow-100 text-yellow-600"
                                title="Edit">
                                <x-heroicon-o-pencil-square class="w-5 h-5" />
                            </button>
                            <button onclick="deleteQuiz({{ $row->id }})"
                                class="p-2 rounded-md hover:bg-red-100 text-red-600"
                                title="Delete">
                                <x-heroicon-o-trash class="w-5 h-5" />
                            </button>
                        </div>
                    </li>
                    @empty
                    <li class="text-gray-600">No quizzes available.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Footer Buttons -->
        <!-- <div class="flex gap-3 mt-10">
            <button type="button" onclick="openQuizModal({{ $module->id }})"
                class="ml-1 cursor-pointer hover:text-blue-500 dark:hover:text-blue-400" title="Add Quiz">
                <x-heroicon-o-clipboard-document-check class="w-6 h-6 text-gray-700 inline-block" /> Add Quiz
            </button>
        </div> -->
    </div>

    <!-- Add Lesson Modal (Hidden Template) -->
    <div id="addLessonModal" class="hidden">
        <form id="CourseLessonForm"
            class="w-[950px] max-w-full space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
            <input type="hidden" name="course_module_id" value="">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lesson Title<span
                        class="text-red-500">*</span></label>
                <input type="text" name="title" placeholder="Enter Lesson Title"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Type</label>
                <select name="type" class="w-full px-4 py-2 rounded-xl border border-gray-300">
                    <option value="text">Text</option>
                    <option value="video">Video</option>
                    <option value="quiz">Quiz</option>
                    <option value="downloadable">Downloadable</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                <textarea name="content" rows="3" placeholder="Enter content"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Video URL</label>
                <input type="url" name="video_url" placeholder="Enter video URL"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Downloadable File</label>
                <input type="file" name="downloadable_file"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Order No<span
                        class="text-red-500">*</span></label>
                <input type="number" name="order_no" placeholder="Order No"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300">
            </div>
        </form>
    </div>

    <!-- Edit Lesson Modal (Hidden Template) -->
    <div id="editLessonModal" class="hidden">
        <form id="editLessonForm"
            class="w-[950px] max-w-full space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
            <input type="hidden" name="id" value="">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lesson Title <span
                        class="text-red-500">*</span></label>
                <input type="text" name="title" class="w-full px-4 py-2 rounded-xl border border-gray-300">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Type</label>
                <select name="type" class="w-full px-4 py-2 rounded-xl border border-gray-300">
                    <option value="text">Text</option>
                    <option value="video">Video</option>
                    <option value="quiz">Quiz</option>
                    <option value="downloadable">Downloadable</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                <textarea name="content" rows="3" class="w-full px-4 py-2 rounded-xl border border-gray-300"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Video URL</label>
                <input type="url" name="video_url" class="w-full px-4 py-2 rounded-xl border border-gray-300">
            </div>
            <div>
                <label for="downloadable_file" class="block text-sm font-semibold text-gray-700 mb-2">Downloadable
                    File</label>
                <input type="file" name="downloadable_file"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300">
                <div id="current_download_file"></div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Order No</label>
                <input type="number" name="order_no" class="w-full px-4 py-2 rounded-xl border border-gray-300">
            </div>
        </form>
    </div>

    <!-- Quiz Form -->
    <!-- Quiz Modal -->
    <!-- Quiz Modal Template (hidden, only for cloning) -->
    <div id="quizModal" class="hidden">
        <form id="quizForm" method="POST" action="" enctype="multipart/form-data"
            class="w-[950px] max-w-full space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
            @csrf
            <input type="hidden" name="module_id" value="{{ $module->id }}">
            <!-- Question -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Question <span class="text-red-500">*</span>
                </label>
                <input type="text" name="question" placeholder="Enter Question" value=""
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 
                   focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400">
            </div>

            <!-- Options -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Option One</label>
                <input type="text" name="option_one" placeholder="Enter option one" value=""
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none text-gray-800">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Option Two</label>
                <input type="text" name="option_two" placeholder="Enter option two" value=""
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none text-gray-800">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Option Three</label>
                <input type="text" name="option_three" placeholder="Enter option three" value=""
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none text-gray-800">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Option Four</label>
                <input type="text" name="option_four" placeholder="Enter option four" value=""
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none text-gray-800">
            </div>

            <!-- Correct Answer -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Correct Answer</label>
                <input type="text" name="correct_answer" placeholder="Enter correct answer" value=""
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 outline-none text-gray-800">
            </div>
        </form>
    </div>

    <style>
        /* Allow the popup to size based on HTML content (forms) instead of default SweetAlert max-width */
        .swal2-popup {
            width: auto !important;
            max-width: none !important;
            display: inline-block;
            /* important so popup wraps the inner form width */
            box-sizing: border-box;
        }

        /* Optional: remove default padding inside content so the form padding stays consistent */
        .swal2-html-container {
            display: block;
        }

        /* Large Success Popup */
        .swal2-popup.swal2-success-message {
            width: 450px !important;
            max-width: 50% !important;
        }
    </style>

</x-app-layout>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Summernote CSS & JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<style>
    .note-editor .note-editable {
        display: block !important;
        text-align: left !important;
        vertical-align: top !important;
    }
</style>
<script>
    // Initialize Summernote on modal open
    function initSummernote(container) {
        container.find("textarea[name='content']").summernote({
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    }

    // ADD LESSON
    function openLessonModal(courseModuleId) {
        Swal.fire({
            title: 'Add Lesson',
            html: $("#addLessonModal").html(),
            showCancelButton: true,
            confirmButtonText: 'Save',
            didOpen: () => {
                let container = $(".swal2-container #CourseLessonForm");
                container.find("input[name='course_module_id']").val(courseModuleId);

                // Initialize Summernote
                initSummernote(container);
            },
            preConfirm: () => {
                let form = $(".swal2-container #CourseLessonForm")[0];
                let formData = new FormData(form);

                // Add Summernote content manually
                formData.set("content", $(".swal2-container #CourseLessonForm textarea[name='content']")
                    .summernote('code'));

                return $.ajax({
                        url: "{{ route('courselessons.store') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }).then(response => response)
                    .catch(xhr => {
                        let error = xhr.responseJSON;
                        if (error.errors) {
                            Swal.showValidationMessage(Object.values(error.errors).flat().join('<br>'));
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
                        }
                    });
            }
        }).then(result => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    title: 'Added!',
                    text: 'Lesson has been added successfully!',
                    icon: 'success',
                    customClass: {
                        popup: 'swal2-success-message'
                    }
                }).then(() => location.reload());
            }
        });
    }

    // EDIT LESSON
    function editLesson(moduleId, lessonId, title, type, content, videoUrl, orderNo, downloadableFile = '') {
        Swal.fire({
            title: 'Edit Course Lesson',
            html: $("#editLessonModal").html(),
            showCancelButton: true,
            confirmButtonText: 'Update',
            didOpen: () => {
                let container = $(".swal2-container #editLessonForm");

                container.find("input[name='id']").val(lessonId);
                container.find("input[name='title']").val(title);
                container.find("select[name='type']").val(type);
                container.find("textarea[name='content']").val(content);
                container.find("input[name='video_url']").val(videoUrl);
                container.find("input[name='order_no']").val(orderNo);

                if (downloadableFile) {
                    container.find("#current_download_file").html(
                        `<p class="mt-2 text-sm">Current: <a href="/uploads/${downloadableFile}" target="_blank" class="text-blue-600 underline">Download</a></p>`
                    );
                }

                // Initialize Summernote with existing content
                initSummernote(container);
                container.find("textarea[name='content']").summernote('code', content);
            },
            preConfirm: () => {
                let form = $(".swal2-container #editLessonForm");
                let formData = new FormData(form[0]);

                // Add Summernote content manually
                formData.set("content", $(".swal2-container #editLessonForm textarea[name='content']")
                    .summernote('code'));

                return $.ajax({
                        url: `/courselessons/${lessonId}`,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "X-HTTP-Method-Override": "PUT"
                        }
                    }).then(response => response)
                    .catch(xhr => {
                        let error = xhr.responseJSON;
                        if (error.errors) {
                            Swal.showValidationMessage(Object.values(error.errors).flat().join('<br>'));
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
                        }
                    });
            }
        }).then(result => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    title: 'Update!',
                    text: 'Lesson has been updated successfully!',
                    icon: 'success',
                    customClass: {
                        popup: 'swal2-success-message'
                    }
                }).then(() => location.reload());
            }
        });
    }

    // DELETE LESSON
    function deleteLesson(lessonId) {
        Swal.fire({
            title: "Are you sure?",
            text: "This will permanently delete the lesson!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/courselessons/${lessonId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message ?? "success",
                            icon: "success",
                            customClass: {
                                popup: "swal2-success-message"
                            }
                        }).then(() => location.reload());
                    },

                    error: function() {
                        Swal.fire("Error", "Failed to delete the lesson.", "error");
                    }
                });
            }
        });
    }
</script>

<script>
    function openQuizModal(moduleId, quizId = null) {
        Swal.fire({
            title: quizId ? 'Edit Quiz' : 'Add Quiz',
            html: $("#quizModal").html(),
            showCancelButton: true,
            confirmButtonText: quizId ? 'Update' : 'Save',
            didOpen: () => {
                let container = Swal.getHtmlContainer().querySelector("#quizForm");
                let $container = $(container);

                // set module_id
                $container.find("input[name='module_id']").val(moduleId);

                // Prefill if editing
                if (quizId) {
                    $.get("{{ url('quizzes') }}/" + quizId + "/data", function(data) {
                        $container.find("input[name='question']").val(data.question);
                        $container.find("input[name='option_one']").val(data.option_one);
                        $container.find("input[name='option_two']").val(data.option_two);
                        $container.find("input[name='option_three']").val(data.option_three);
                        $container.find("input[name='option_four']").val(data.option_four);
                        $container.find("input[name='correct_answer']").val(data.correct_answer);
                    });
                }
            },
            // preConfirm: () => {
            //     let form = Swal.getHtmlContainer().querySelector("#quizForm");
            //     let formData = new FormData(form);

            //     let url = quizId ? "{{ url('quizzes') }}/" + quizId : "{{ route('quizzes.store') }}";
            //     if (quizId) formData.append('_method', 'PUT'); // Laravel update method spoofing

            //     return $.ajax({
            //             url: url,
            //             type: "POST", // Always POST, Laravel will detect `_method` for PUT
            //             data: formData,
            //             processData: false,
            //             contentType: false,
            //             headers: {
            //                 "X-CSRF-TOKEN": "{{ csrf_token() }}"
            //             }
            //         }).then(response => response)
            //         .catch(xhr => {
            //             let error = xhr.responseJSON;
            //             if (error && error.errors) {
            //                 Swal.showValidationMessage(
            //                     Object.values(error.errors).flat().join('<br>')
            //                 );
            //             } else {
            //                 Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
            //             }
            //         });
            // }

            preConfirm: () => {
                let form = Swal.getHtmlContainer().querySelector("#quizForm");
                let formData = new FormData(form);

                let optionOne = formData.get("option_one");
                let optionTwo = formData.get("option_two");
                let optionThree = formData.get("option_three");
                let optionFour = formData.get("option_four");
                let correctAnswer = formData.get("correct_answer");

                // Validate correct answer matches one of the options
                if (![optionOne, optionTwo, optionThree, optionFour].includes(correctAnswer)) {
                    Swal.showValidationMessage("Correct answer must match one of the options.");
                    return false;
                }

                let url = quizId ? "{{ url('quizzes') }}/" + quizId : "{{ route('quizzes.store') }}";
                if (quizId) formData.append('_method', 'PUT'); // Laravel method spoofing

                return $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }).then(response => response)
                    .catch(xhr => {
                        let error = xhr.responseJSON;
                        if (error && error.errors) {
                            Swal.showValidationMessage(
                                Object.values(error.errors).flat().join('<br>')
                            );
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
                        }
                        // return Promise.reject();
                    });
            }

        }).then(result => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    title: "Success!",
                    text: quizId ? "Quiz has been updated successfully!" : "Quiz has been added successfully!",
                    icon: "success",
                    customClass: {
                        popup: "swal2-success-message"
                    }
                }).then(() => location.reload());

            }
        });
    }
</script>

<script>
    // DELETE QUIZ
    function deleteQuiz(quizId) {
        Swal.fire({
            title: "Are you sure?",
            text: "This will permanently delete the quiz!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/quizzes/${quizId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message ?? "The quiz has been deleted.",
                            icon: "success",
                            customClass: {
                                popup: "swal2-success-message"
                            }
                        }).then(() => location.reload());
                    },

                    error: function(xhr) {
                        Swal.fire("Error", "Failed to delete the quiz.", "error");
                    }
                });
            }
        });
    }
</script>