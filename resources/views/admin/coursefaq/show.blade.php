<x-app-layout>
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-book-open class="w-8 h-8 text-blue-600" />
                {{ $coursefaq->title }}
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
                <p class="mb-2 text-sm text-gray-500">Course Faq</p>
                <p class="text-lg font-semibold text-gray-800">{{ $coursefaq->title ?? 'N/A' }}</p>
            </div>

            <!-- Order No -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Order No</p>
                <p class="text-gray-800">{{ $coursefaq->order_no ?? 'N/A' }}</p>
            </div>

            <!-- Description -->
            <div class="md:col-span-2 p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Description</p>
                <p class="text-gray-700 leading-relaxed">
                    {!! $coursefaq->description ?? 'N/A' !!}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
