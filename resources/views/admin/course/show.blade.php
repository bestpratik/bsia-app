<x-app-layout>
    <div class="max-w-6xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600" />
                {{ $course->title }}
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
            </div>
        </div>

        <!-- Footer Buttons -->
        <div class="flex gap-3 mt-10">
            <a href="{{ route('edit.course', $course->id) }}"
                class="px-6 py-2.5 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                <x-heroicon-o-pencil-square class="w-5 h-5 inline-block mr-1" />
                Edit Course
            </a>
            <form action="{{ route('delete.course', $course->id) }}" method="POST"
                onsubmit="return confirm('Delete this course?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-6 py-2.5 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                    <x-heroicon-o-trash class="w-5 h-5 inline-block mr-1" />
                    Delete
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
