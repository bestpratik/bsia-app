<x-app-layout>
    <div class="max-w-7xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-book-open class="w-8 h-8 text-blue-600" />
                {{ $lesson->title ?? 'Untitled Lesson' }}
            </h2>
            <a href="{{ route('course') }}"
                class="mt-4 sm:mt-0 px-5 py-2.5 text-sm font-medium text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg transition duration-200">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline-block" /> Back to Module
            </a>
        </div>

        <!-- Lesson Info -->
        <div class="space-y-6">

            <!-- Lesson Type -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Lesson Type</p>
                <span
                    class="px-3 py-1 text-sm rounded-full 
                    @if ($lesson->type === 'video') bg-purple-100 text-purple-700
                    @elseif($lesson->type === 'quiz') bg-yellow-100 text-yellow-700
                    @elseif($lesson->type === 'downloadable') bg-blue-100 text-blue-700
                    @else bg-gray-100 text-gray-700 @endif">
                    {{ ucfirst($lesson->type ?? 'N/A') }}
                </span>
            </div>

            <!-- Content -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Content</p>
                <div class="prose max-w-none text-gray-700">
                    {!! $lesson->content ?? '<span class="text-gray-400">No content available</span>' !!}
                </div>
            </div>

            <!-- Video -->
            @if ($lesson->video_url)
                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-2 text-sm text-gray-500">Video</p>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe src="{{ $lesson->video_url }}" frameborder="0" allowfullscreen
                            class="w-full h-64 rounded-lg border"></iframe>
                    </div>
                </div>
            @endif

            <!-- Downloadable File -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Downloadable File</p>
                @if ($lesson->downloadable_file)
                    <a href="{{ asset('uploads/' . $lesson->downloadable_file) }}" target="_blank"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg border border-blue-200 hover:bg-blue-100 transition">
                        <x-heroicon-o-document-arrow-down class="w-5 h-5" />
                        Download File
                    </a>
                @else
                    <span class="text-gray-400">Not uploaded</span>
                @endif
            </div>

            <!-- Order No -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Order No</p>
                <p class="text-gray-800">{{ $lesson->order_no ?? 'N/A' }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
