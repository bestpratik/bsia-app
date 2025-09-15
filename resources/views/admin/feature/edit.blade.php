<x-app-layout>
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible max-w-4xl mx-auto">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            {{ $message }}
        </div>
    @endif
    <div
        class="bg-white border rounded-lg col-span-2 mt-4 p-8 flex flex-wrap align-center justify-between max-w-7xl mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 m-0">
            Edit Features
        </h2>
        <a href="{{ route('features') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>
        <form class="bg-white w-full space-y-4" method="post" action="{{ route('update.features', $features->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Name<span class="text-red-700">*</span>
                    <input name="name" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $features->name ?? '' }}" placeholder="Enter Name">
                        @if ($errors->has('name'))
                        <span class="mt-1 text-sm text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </label>
            </div>

            <div>
                <label class="block">Order No</label>
                <input name="order_no" type="number" value="{{ $features->order_no ?? '' }}"
                    class="w-full mt-1 p-2 border rounded">
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Icon</span>
                    <input name="icon" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $features->icon ?? '' }}" placeholder="Enter Icon">
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Description</span>
                    <input type="text" name="description" id="summernote" type="text" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Description" value="{{ old('description', $features->description) }}">
                </label>
            </div>

            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Update</button>
        </form>
    </div>

</x-app-layout>
