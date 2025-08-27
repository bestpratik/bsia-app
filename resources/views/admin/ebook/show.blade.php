<x-app-layout>
    <div class="max-w-6xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600" />
                {{ $ebook->title }}
            </h2>
            <a href="{{ route('ebook') }}"
                class="mt-4 sm:mt-0 px-5 py-2.5 text-sm font-medium text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg transition duration-200">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline-block" /> Back to List
            </a>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">

                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-2 text-sm text-gray-500">Description</p>
                    <p class="text-gray-700 leading-relaxed">
                        {!! $ebook->description ?? 'N/A' !!}
                    </p>
                </div>

                <!-- Author Info -->
                <div class="p-5 rounded-xl bg-gray-50 border">
                    <p class="mb-2 text-sm text-gray-500">Author</p>
                    <p class="text-lg font-semibold text-gray-800">{{ $ebook->author ?? 'N/A' }}</p>
                </div>

                <!-- Pricing -->
                <div class="p-5 rounded-xl bg-gray-50 border flex gap-6">
                    <div>
                        <p class="mb-2 text-sm text-gray-500">Price</p>
                        <p class="text-lg font-semibold text-green-600">₹{{ $ebook->price ?? '0.00' }}</p>
                    </div>
                </div>

                <!-- Other Info -->
                <div class="p-5 rounded-xl bg-gray-50 border grid grid-cols-2 gap-4">
                    <div>
                        <p class="mb-2 text-sm text-gray-500">Status</p>
                        <span
                            class="px-3 py-1 text-sm rounded-full 
                            {{ $ebook->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $ebook->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <div class="p-5 rounded-xl bg-gray-50 border flex flex-col items-center">
                    <p class="mb-3 text-sm text-gray-500">Featured Image</p>
                    @if ($ebook->featured_image)
                        <img src="{{ asset('uploads/' . $ebook->featured_image) }}" alt="Featured Image"
                            class="w-52 h-52 object-cover rounded-lg border shadow-sm">
                    @else
                        <span class="text-gray-400">Not uploaded</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


