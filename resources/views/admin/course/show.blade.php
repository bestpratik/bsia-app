<x-app-layout>
    <div class="max-w-7xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600" />
                {{ $course->title ?? '' }}
            </h2>
            <a href="{{ route('course') }}"
                class="mt-4 sm:mt-0 px-5 py-2.5 text-sm font-medium text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg transition duration-200">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline-block" /> Back to List
            </a>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">

                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-2 text-sm text-gray-500">Short Description</p>
                    <p class="text-gray-700 leading-relaxed">
                        {!! $course->short_description ?? 'N/A' !!}
                    </p>
                </div>

                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-2 text-sm text-gray-500">About Course</p>
                    <div class="prose max-w-none text-gray-700">
                        {!! $course->about_course ?? '<span class="text-gray-400">N/A</span>' !!}
                    </div>
                </div>

                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-2 text-sm text-gray-500">Why Join the Course</p>
                    <div class="prose max-w-none text-gray-700">
                        {!! $course->why_join_the_course ?? '<span class="text-gray-400">N/A</span>' !!}
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-2 text-sm text-gray-500">Instructor Name</p>
                    <p class="text-lg font-semibold text-gray-800">{{ $course->instructor_name ?? 'N/A' }}</p>

                    <p class="mt-3 mb-2 text-sm text-gray-500">Instructor Designation</p>
                    <p class="text-gray-700">{{ $course->instructor_designation ?? 'N/A' }}</p>

                    <p class="mt-3 mb-2 text-sm text-gray-500">Instructor Details</p>
                    <div class="prose max-w-none text-gray-700">
                        {!! $course->instructor_details ?? '<span class="text-gray-400">N/A</span>' !!}
                    </div>
                </div>

                <!-- Pricing -->
                <div class="p-5 rounded-xl bg-gray-50 border flex gap-6">
                    <div>
                        <p class="mb-2 text-sm text-gray-500">MRP</p>
                        <p class="text-lg font-semibold text-gray-800">₹{{ $course->mrp ?? '0.00' }}</p>
                    </div>
                    <div>
                        <p class="mb-2 text-sm text-gray-500">Sellable Price</p>
                        <p class="text-lg font-semibold text-green-600">₹{{ $course->sellable_price ?? '0.00' }}</p>
                    </div>
                </div>

                <!-- Other Info -->
                <div class="p-5 rounded-xl bg-gray-50 border grid grid-cols-2 gap-4">
                    <div>
                        <p class="mb-2 text-sm text-gray-500">Language</p>
                        <p class="text-gray-800">{{ $course->language ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="mb-2 text-sm text-gray-500">Status</p>
                        <span
                            class="px-3 py-1 text-sm rounded-full 
                            {{ $course->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $course->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div>
                        <p class="mb-2 text-sm text-gray-500">Order No</p>
                        <p class="text-gray-800">{{ $course->order_no ?? 'N/A' }}</p>
                    </div>
                </div>
                <div>
                    <button type="button" onclick="openCourseFaqModal({{ $course->id }})"
                        class="ml-1 cursor-pointer hover:text-purple-500 dark:hover:text-purple-400" title="Add Faq">
                        <x-heroicon-o-book-open class="w-6 h-6 text-gray-700 inline-block" /> Add Course Faq
                    </button>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Course Faqs</h4>
                    <ul class="list-disc pl-6" id="modulesList">
                        @if ($courseFaq->isEmpty())
                            <li class="text-gray-700">No Faq available.</li>
                        @else
                            @foreach ($courseFaq as $row)
                                <li class="pl-2">
                                    <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border"
                                        id="module-{{ $row->id }}">
                                        <div>
                                            <a href="{{ route('show.coursefaq', $row->id) }}"
                                                class="text-blue-600 hover:underline">
                                                {{ $row->title }}
                                            </a>
                                        </div>
                                        <div class="flex gap-2">
                                            <!-- Show Button -->
                                            <a href="{{ route('show.coursefaq', $row->id) }}"
                                                class="ml-1 cursor-pointer hover:text-green-500 dark:hover:text-green-400"
                                                title="View">
                                                <x-heroicon-o-eye class="w-6 h-6 text-gray-700" />
                                            </a>
                                            <button onclick='openEditFaqModal(@json($row))'
                                                class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</button>
                                            <button onclick="deleteFaq({{ $row->id }})"
                                                class="px-3 py-1 bg-red-600 text-white rounded-lg">Delete</button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <div class="p-5 rounded-xl bg-gray-50 border flex flex-col items-center">
                    <p class="mb-3 text-sm text-gray-500">Featured Image</p>
                    @if ($course->featured_image)
                        <img src="{{ asset('uploads/' . $course->featured_image) }}" alt="Featured Image"
                            class="w-52 h-52 object-cover rounded-lg border shadow-sm">
                    @else
                        <span class="text-gray-400">Not uploaded</span>
                    @endif
                </div>

                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-3 text-sm text-gray-500">Certificate File</p>
                    @if ($course->certificate_file)
                        <a href="{{ asset('uploads/' . $course->certificate_file) }}" target="_blank"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg border border-blue-200 hover:bg-blue-100 transition">
                            <x-heroicon-o-document-text class="w-5 h-5" />
                            View Certificate (PDF)
                        </a>
                    @else
                        <span class="text-gray-400">Not uploaded</span>
                    @endif
                </div>
                <div>
                    <button type="button" onclick="openCourseModuleModal({{ $course->id }})"
                        class="ml-1 cursor-pointer hover:text-purple-500 dark:hover:text-purple-400" title="Add Module">
                        <x-heroicon-o-book-open class="w-6 h-6 text-gray-700 inline-block" /> Add Course Module
                    </button>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Course Modules</h4>
                    <ul class="list-disc pl-6" id="modulesList">
                        @if ($courseModules->isEmpty())
                            <li class="text-gray-700">No Modules available.</li>
                        @else
                            @foreach ($courseModules as $row)
                                <li class="pl-2">
                                    <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border"
                                        id="module-{{ $row->id }}">
                                        <div>
                                            <a href="{{ route('show.coursemodules', $row->id) }}"
                                                class="text-blue-600 hover:underline">
                                                {{ $row->name }}
                                            </a>
                                        </div>
                                        <div class="flex gap-2">
                                            <!-- Show Button -->
                                            <a href="{{ route('show.coursemodules', $row->id) }}"
                                                class="ml-1 cursor-pointer hover:text-green-500 dark:hover:text-green-400"
                                                title="View">
                                                <x-heroicon-o-eye class="w-6 h-6 text-gray-700" />
                                            </a>
                                            <button type="button"
                                                class="px-2 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600"
                                                onclick="editCourseModule({{ $row->id }}, '{{ addslashes($row->name) }}', '{{ addslashes($row->description ?? '') }}', '{{ $row->order_no ?? '' }}', {{ $row->status ? 1 : 0 }})">
                                                Edit
                                            </button>
                                            <button type="button"
                                                class="px-2 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700"
                                                onclick="deleteCourseModule({{ $row->id }})">
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
        </div>

        {{-- Hidden Modal Templates --}}

        <!-- Add Module Form -->
        <div id="addModuleFormTemplate" class="hidden">
            <form id="courseModuleForm"
                class="w-[950px] max-w-full space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
                <input type="hidden" name="course_id" id="add-course-id">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Module Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" placeholder="Enter module name"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3" placeholder="Enter description"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Order No<span
                            class="text-red-500">*</span></label>
                    <input type="number" name="order_no" placeholder="Order No"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="status" value="1" id="status"
                        class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="status" class="ml-2 text-gray-700 font-medium">Active</label>
                </div>
            </form>
        </div>

        <!-- Edit Module Form -->
        <div id="editModuleFormTemplate" class="hidden">
            <form id="editCourseModuleForm"
                class="w-[950px] max-w-full space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
                <input type="hidden" name="id" id="edit-id">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Module Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" id="edit-name"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="edit-description" rows="3"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Order No</label>
                    <input type="number" name="order_no" id="edit-order_no"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="status" value="1" id="edit-status"
                        class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="edit-status" class="ml-2 text-gray-700 font-medium">Active</label>
                </div>
            </form>
        </div>


        <!-- Add FAQ Form -->
        <div id="addFaqFormTemplate" class="hidden">
            <form id="courseFaqForm"
                class="w-[950px] max-w-full space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
                <input type="hidden" name="course_id" id="faq-course-id">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">FAQ Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" placeholder="Enter FAQ title"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2"><span
                            class="text-gray-500">Description</span></label>
                    <textarea name="description" rows="3" placeholder="Enter description"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Order No <span
                            class="text-red-500">*</span></label>
                    <input type="number" name="order_no" placeholder="Order No"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 placeholder-gray-400">
                </div>
            </form>
        </div>

        <!-- Edit FAQ Form -->
        <div id="editFaqFormTemplate" class="hidden">
            <form id="editCourseFaqForm"
                class="w-[950px] max-w-full space-y-5 p-6 bg-white rounded-2xl shadow-lg border border-gray-200">
                <input type="hidden" name="faq_id" id="edit-faq-id">
                <input type="hidden" name="course_id" id="edit-faq-course-id">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">FAQ Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" id="edit-faq-title"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2"><span
                            class="text-gray-500">Description</span></label>
                    <textarea name="description" id="edit-faq-description" rows="3"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2"><span class="text-gray-500">Order
                            No</span></label>
                    <input type="number" name="order_no" id="edit-faq-order-no"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800">
                </div>
            </form>
        </div>
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
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Summernote -->
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
    // ADD MODULE
    function openCourseModuleModal(courseId) {
        let formHtml = $("#addModuleFormTemplate").html();
        Swal.fire({
            title: 'Add Course Module',
            html: formHtml,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Save',
            didOpen: (popup) => {
                $(popup).find("#add-course-id").val(courseId);
                $(popup).find("textarea[name='description']").summernote({
                    height: 150
                });
            },
            preConfirm: () => {
                let form = Swal.getPopup().querySelector("#courseModuleForm");
                let formData = new FormData(form);
                let summernoteContent = $(Swal.getPopup()).find("textarea[name='description']").summernote(
                    'code');
                formData.set("description", summernoteContent);
                return $.ajax({
                        url: "{{ route('course-modules.store') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => response)
                    .catch(xhr => {
                        let error = xhr.responseJSON;
                        if (error.errors) {
                            Swal.showValidationMessage(
                                Object.values(error.errors).flat().join('<br>')
                            );
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
                        }
                    });
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    title: 'Added!',
                    text: 'Course Module has been added successfully!',
                    icon: 'success',
                    customClass: {
                        popup: 'swal2-success-message'
                    }
                }).then(() => location.reload());
            }
        });
    }

    // EDIT MODULE
    function editCourseModule(id, name, description, orderNo, status) {
        let formHtml = $("#editModuleFormTemplate").html();
        Swal.fire({
            title: 'Edit Course Module',
            html: formHtml,
            showCancelButton: true,
            confirmButtonText: 'Update',
            didOpen: (popup) => {
                // Fill values inside SweetAlert popup
                $(popup).find("#edit-id").val(id);
                $(popup).find("#edit-name").val(name);
                $(popup).find("#edit-description").summernote({
                    height: 150
                }).summernote('code', description);
                $(popup).find("#edit-order_no").val(orderNo);
                $(popup).find("#edit-status").prop('checked', status == 1);
            },
            preConfirm: () => {
                let form = Swal.getPopup().querySelector("#editCourseModuleForm");
                let formData = new FormData(form);
                let summernoteContent = $(Swal.getPopup()).find("#edit-description").summernote('code');
                formData.set("description", summernoteContent);
                return $.ajax({
                        url: `/course-modules/${id}`,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "X-HTTP-Method-Override": "PUT"
                        }
                    })
                    .then(response => response)
                    .catch(xhr => {
                        let error = xhr.responseJSON;
                        if (error.errors) {
                            Swal.showValidationMessage(
                                Object.values(error.errors).flat().join('<br>')
                            );
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
                        }
                    });
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    title: 'Updated!',
                    text: 'Course Module has been updated successfully!',
                    icon: 'success',
                    customClass: {
                        popup: 'swal2-success-message'
                    }
                }).then(() => location.reload());
            }
        });
    }

    // DELETE MODULE
    function deleteCourseModule(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: `/course-modules/${id}`,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "X-HTTP-Method-Override": "DELETE"
                        }
                    })
                    .done(() => {
                        $(`#module-${id}`).closest('li').remove();
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Course Module has been deleted successfully!',
                            icon: 'success',
                            customClass: {
                                popup: 'swal2-success-message'
                            }
                        }).then(() => location.reload());
                    })
                    .fail(() => {
                        Swal.fire('Error!', 'Failed to delete module.', 'error');
                    });
            }
        });
    }

    // ADD FAQ
    function openCourseFaqModal(courseId) {
        let formHtml = $("#addFaqFormTemplate").html();
        Swal.fire({
            title: 'Add Course FAQ',
            html: formHtml,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Save',
            didOpen: (popup) => {
                $(popup).find("#faq-course-id").val(courseId);
                $(popup).find("textarea[name='description']").summernote({
                    height: 150
                });
            },
            preConfirm: () => {
                let form = Swal.getPopup().querySelector("#courseFaqForm");
                let formData = new FormData(form);
                let summernoteContent = $(Swal.getPopup()).find("textarea[name='description']").summernote(
                    'code');
                formData.set("description", summernoteContent);
                return $.ajax({
                        url: "{{ route('courseFaq.store') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => response)
                    .catch(xhr => {
                        let error = xhr.responseJSON;
                        if (error.errors) {
                            Swal.showValidationMessage(
                                Object.values(error.errors).flat().join('<br>')
                            );
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
                        }
                    });
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    title: 'Added!',
                    text: 'FAQ has been added successfully!',
                    icon: 'success',
                    customClass: {
                        popup: 'swal2-success-message'
                    }
                }).then(() => location.reload());
            }
        });
    }

    // EDIT FAQ
    function openEditFaqModal(faq) {
        let formHtml = $("#editFaqFormTemplate").html();
        Swal.fire({
            title: 'Edit Course FAQ',
            html: formHtml,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Update',
            didOpen: (popup) => {
                $(popup).find("#edit-faq-id").val(faq.id);
                $(popup).find("#edit-faq-course-id").val(faq.course_id);
                $(popup).find("#edit-faq-title").val(faq.title);
                $(popup).find("#edit-faq-description").summernote({
                    height: 150
                }).summernote('code', faq.description);
                $(popup).find("#edit-faq-order-no").val(faq.order_no);
            },
            preConfirm: () => {
                let form = Swal.getPopup().querySelector("#editCourseFaqForm");
                let formData = new FormData(form);
                let summernoteContent = $(Swal.getPopup()).find("#edit-faq-description").summernote('code');
                formData.set("description", summernoteContent);
                return $.ajax({
                        url: "/course/faq/" + formData.get("faq_id") + "/update",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => response)
                    .catch(xhr => {
                        let error = xhr.responseJSON;
                        if (error.errors) {
                            Swal.showValidationMessage(
                                Object.values(error.errors).flat().join('<br>')
                            );
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.statusText}`);
                        }
                    });
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    title: 'Update!',
                    text: 'FAQ has been updated successfully!',
                    icon: 'success',
                    customClass: {
                        popup: 'swal2-success-message'
                    }
                }).then(() => location.reload());
            }
        });
    }

    // DELETE FAQ
    function deleteFaq(faqId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This FAQ will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/course-faq/" + faqId + "/delete",
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message ?? "success.",
                            icon: "success",
                            customClass: {
                                popup: "swal2-success-message"
                            }
                        }).then(() => location.reload());
                    },

                    error: function(xhr) {
                        Swal.fire('Error!', 'Failed to delete FAQ.', 'error');
                    }
                });
            }
        });
    }
</script>
