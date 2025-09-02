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
            Edit Banner
        </h2>
        <a href="{{ route('banner') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>
        <form class="bg-white w-full space-y-4" method="post" action="{{ route('update.banner', $banner->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Type -->
            <div>
                <label class="block text-sm font-medium mb-2">Banner Type</label>
                <select name="type" class="w-full border-gray-300 rounded-lg">
                    <option value="image" {{ $banner->type == 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ $banner->type == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>

            <!-- Title -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Title</span>
                    <input name="title" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $banner->title }}" placeholder="Enter Title">
                    @if ($errors->has('title'))
                        <span class="mt-1 text-sm text-red-500">{{ $errors->first('title') }}</span>
                    @endif
                </label>
            </div>

            <!-- Sub Title -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Sub Title</span>
                    <input name="sub_title" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $banner->sub_title }}" placeholder="Enter Sub Title">
                    @if ($errors->has('sub_title'))
                        <span class="mt-1 text-sm text-red-500">{{ $errors->first('sub_title') }}</span>
                    @endif
                </label>
            </div>

            <!-- Image -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Image</span>
                    <input id="imageInput" name="image" type="file" onchange="previewImage(event)"
                        class="w-full mt-1 p-2 border rounded">
                </label>
                <div class="shrink-0">
                    <img id='preview' class="h-16 w-16 object-cover rounded-full"
                        src="{{ asset('uploads/' . $banner->image) }}" alt="Current photo" />
                </div>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Video URL (for Video Type)</span>
                    <input name="video_url" type="url" class="w-full mt-1 p-2 border rounded"
                        value="{{ $banner->video_url }}" placeholder="https://www.youtube.com/embed/...">
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Button Text One</span>
                    <input name="button_text_one" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $banner->button_text_one }}" placeholder="Enter Button Text">
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Button Link One</span>
                    <input name="button_link_one" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $banner->button_link_one }}" placeholder="Enter Button Link">
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Button Text Two</span>
                    <input name="button_text_two" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $banner->button_text_two }}" placeholder="Enter Button Text">
                </label>
            </div>

            <div>
                <label class="block">
                    <span class="text-gray-700">Button Link Two</span>
                    <input name="button_link_two" type="text" class="w-full mt-1 p-2 border rounded"
                        value="{{ $banner->button_link_two }}" placeholder="Enter Button Link">
                </label>
            </div>

            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Update</button>
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
