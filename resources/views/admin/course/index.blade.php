<x-app-layout>
    <div class="grid grid-cols-12 gap-4 md:gap-6">

        <div class="col-span-12">
            <!-- Table Four -->
            @if (session('success'))
                <div class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50  dark:text-green-400">
                    {{ session('success') }}
                </div>
            @endif
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 ">
                <div class="flex flex-col gap-5 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <h3 class="text-lg font-semibold  /90">
                            Manage Course
                        </h3>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <div>
                            <a href="{{ route('create.course') }}"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                Add
                            </a>
                        </div>
                    </div>
                </div>

                <div class="max-w-full overflow-x-auto custom-scrollbar">
                    <table class="min-w-full">
                        <!-- table header start -->
                        <thead class="border-gray-100 border-y bg-gray-50 ">
                            <tr>
                                <th class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <span class="block font-medium text-gray-500 text-theme-xs ">
                                                    Sl no.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs ">
                                            Course Name
                                        </p>
                                    </div>
                                </th>

                                <th class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs ">
                                            Featured Image
                                        </p>
                                    </div>
                                </th>

                                <th class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <p class="font-medium text-gray-500 text-theme-xs ">
                                            Certificate File
                                        </p>
                                    </div>
                                </th>

                                <th class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs ">
                                            Status
                                        </p>
                                    </div>
                                </th>

                                <th class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <p class="font-medium text-gray-500 text-theme-xs ">
                                            Action
                                        </p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <!-- table header end -->

                        <!-- table body start -->
                        <tbody class="divide-y divide-gray-100 ">
                            @php
                                $i = 0;
                            @endphp

                            @forelse ($course as $row)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex items-center gap-3">

                                                <div>
                                                    <span class="block font-medium text-gray-700 text-theme-sm ">
                                                        {{ $i }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <span class="text-theme-sm mb-0.5 block font-medium text-gray-700 ">
                                                        {{ $row->title }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <img src="{{ $row->featured_image ? asset('uploads/' . $row->featured_image) : asset('photo/default-banner.jpg') }}"
                                                        alt="Featured Image"
                                                        class="w-16 h-16 object-cover rounded-md border">
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center justify-center gap-3">
                                            <div>
                                                @if ($row->certificate_file)
                                                    <a href="{{ asset('uploads/' . $row->certificate_file) }}"
                                                        target="_blank" class="text-blue-600 hover:text-blue-800"
                                                        title="View PDF">
                                                        <!-- Heroicon: Document Arrow Down -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-8 h-8">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5v-9m0 9l-3-3m3 3l3-3M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25
                                 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25
                                 2.25 0 006 20.25z" />
                                                        </svg>
                                                    </a>
                                                @else
                                                    <span class="text-gray-400">Not uploaded</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>


                                    <td class="px-6 py-3 whitespace-nowrap">
                                        @if ($row->status)
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                                Active
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <a href="{{ route('edit.course', $row->id) }}"
                                                class="ml-1 cursor-pointer hover:text-blue-500 dark:hover:text-blue-400">
                                                <x-heroicon-o-pencil-square class="w-6 h-6 text-gray-700" />
                                            </a>
                                            <a href="{{ route('show.course', $row->id) }}"
                                                class="ml-1 cursor-pointer hover:text-green-500 dark:hover:text-green-400"
                                                title="View">
                                                <x-heroicon-o-eye class="w-6 h-6 text-gray-700" />
                                            </a>
                                            <form action="{{ route('course.toggleStatus', $row->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" onchange="this.form.submit()"
                                                        class="sr-only peer" {{ $row->status ? 'checked' : '' }}>
                                                    <div
                                                        class="ml-1 w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 
                                                                peer-focus:ring-2 peer-focus:ring-green-300 relative 
                                                                after:content-[''] after:absolute after:top-[2px] after:start-[2px] 
                                                                after:bg-white after:border-gray-300 after:border 
                                                                after:rounded-full after:h-5 after:w-5 after:transition-all 
                                                                peer-checked:after:translate-x-full peer-checked:after:border-white">
                                                    </div>
                                                </label>
                                            </form>
                                            <form action="{{ route('delete.course', $row->id) }}" method="POST"
                                                onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete"
                                                    class="ml-1 cursor-pointer hover:text-red-500 dark:hover:text-red-400">
                                                    <x-heroicon-o-trash class="w-6 h-6 text-gray-700" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center px-6 py-4 text-gray-500 ">
                                        No data found.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                        <!-- table body end -->
                    </table>
                </div>
            </div>
            <!-- Table Four -->
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    function confirmDelete() {
        return confirm('Are you sure you want to delete this data ?');
    }
</script>
