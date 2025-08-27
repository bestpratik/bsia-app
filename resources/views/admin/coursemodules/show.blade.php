<x-app-layout>
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-book-open class="w-8 h-8 text-blue-600" />
                {{ $module->name }}
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
                    {{ $module->description ?? 'N/A' }}
                </p>
            </div>

            <!-- Status -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Status</p>
                <span
                    class="px-3 py-1 text-sm font-medium rounded-full 
                    {{ $module->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $module->status ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Course Lessons</h4>
                <ul class="list-disc pl-6" id="lessonList">
                    @if ($courseLesson->isEmpty())
                        <li class="text-gray-700">No Lesson available.</li>
                    @else
                        @foreach ($courseLesson as $row)
                            <li class="pl-2">
                                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border"
                                    id="lesson-{{ $row->id }}">
                                    <a href="{{ route('show.courselessons', $row->id) }}"
                                        class="text-blue-600 hover:underline">
                                        {{ $row->title }}
                                    </a>
                                    <div class="flex gap-2">
                                        <!-- Show Button -->
                                        <a href="{{ route('show.courselessons', $row->id) }}"
                                                class="ml-1 cursor-pointer hover:text-green-500 dark:hover:text-green-400"
                                                title="View">
                                                <x-heroicon-o-eye class="w-6 h-6 text-gray-700" />
                                            </a>
                                        <!-- Edit Button -->
                                        <button type="button"
                                            onclick="editLesson({{ $module->id }}, {{ $row->id }}, `{{ addslashes($row->title) }}`, `{{ $row->type }}`, `{{ addslashes($row->content ?? '') }}`, `{{ $row->video_url ?? '' }}`, `{{ $row->order_no ?? '' }}`, `{{ $row->downloadable_file ?? '' }}`)"
                                            class="px-3 py-1 text-xs bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                            Edit
                                        </button>

                                        <!-- Delete Button -->
                                        <button type="button" onclick="deleteLesson({{ $row->id }})"
                                            class="px-3 py-1 text-xs bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <!-- Footer Buttons -->
        <div class="flex gap-3 mt-10">
            <button type="button" onclick="openLessonModal({{ $module->id }})"
                class="ml-1 cursor-pointer hover:text-purple-500 dark:hover:text-purple-400" title="Add Lesson">
                <x-heroicon-o-list-bullet class="w-6 h-6 text-gray-700 inline-block" /> Add Course Lesson
            </button>
        </div>

    </div>

    <!-- Add Lesson Modal (Hidden Template) -->
    <div id="addLessonModal" class="hidden">
        <form id="courseLessonForm" class="space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
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
        <form id="editLessonForm" class="space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
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
</x-app-layout>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // ADD LESSON
    function openLessonModal(courseModuleId) {
        Swal.fire({
            title: 'Add Lesson',
            html: $("#addLessonModal").html(), // clone form template
            showCancelButton: true,
            confirmButtonText: 'Save',
            didOpen: () => {
                let container = $(".swal2-container #courseLessonForm");
                container.find("input[name='course_module_id']").val(courseModuleId);
            },
            preConfirm: () => {
                let form = $(".swal2-container #courseLessonForm")[0];
                let formData = new FormData(form);

                return $.ajax({
                        url: "{{ route('course-lessons.store') }}",
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
                Swal.fire("Saved!", "Lesson has been added.", "success")
                    .then(() => location.reload());
            }
        });
    }

    // EDIT LESSON
    function editLesson(moduleId, lessonId, title, type, content, videoUrl, orderNo, downloadableFile = '') {
        Swal.fire({
            title: 'Edit Course Lesson',
            html: $("#editLessonModal").html(), // load template
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
            },
            preConfirm: () => {
                let form = $(".swal2-container #editLessonForm");
                let formData = new FormData(form[0]);

                return $.ajax({
                        url: `/course-lessons/${lessonId}`,
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
                Swal.fire("Updated!", "Lesson has been updated.", "success")
                    .then(() => location.reload());
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
                    url: `/course-lessons/${lessonId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function() {
                        Swal.fire("Deleted!", "The lesson has been deleted.", "success").then(
                            () => {
                                location.reload();
                            });
                    },
                    error: function() {
                        Swal.fire("Error", "Failed to delete the lesson.", "error");
                    }
                });
            }
        });
    }
</script>
