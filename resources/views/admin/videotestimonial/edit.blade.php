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
            Edit Video Testimonial
        </h2>
        <a href="{{ route('videotestimonial') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500  dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
        </a>

        <form class="bg-white w-full space-y-4" method="post"
            action="{{ route('update.videotestimonial', $videoTestimonial->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block">Name<span class="text-red-700">*</span>
                    <input name="name" type="text" class="w-full mt-1 p-2 border rounded" placeholder="Enter Name"
                        value="{{ old('name', $videoTestimonial->name) }}">
                    @if ($errors->has('name'))
                        <span class="mt-1 text-sm text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </label>
            </div>

            <!-- Image file -->
            <div>
                <label class="block">
                    <span class="text-gray-700">Image</span>
                    <input name="image" type="file" onchange="loadFile(event)"
                        class="w-full mt-1 p-2 border rounded">
                </label>
                <div class="shrink-0">
                    <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                        src="{{ asset('uploads/' . $videoTestimonial->image) }}" alt="Current photo" />
                </div>
            </div>

            <!-- Location -->
            <div>
                <label class="block">Location<span class="text-red-700">*</span>
                    <input name="location" type="text" class="w-full mt-1 p-2 border rounded"
                        placeholder="Enter Location" value="{{ old('location', $videoTestimonial->location) }}">
                    @if ($errors->has('location'))
                        <span class="mt-1 text-sm text-red-500">{{ $errors->first('location') }}</span>
                    @endif
                </label>
            </div>

            <!-- Video File -->
            <div>
                <label class="block font-medium">Video File</label>
                <input type="file" name="video_path" id="videoInput" class="w-full border rounded p-2"
                    accept="video/*" onchange="previewVideo(event)">

                <!-- Existing Video -->
                @if ($videoTestimonial->video_path)
                    <video id="preview_video" class="mt-2 border rounded" style="height: 100px;" controls>
                        <source src="{{ asset('uploads/testimonialvideos/' . $videoTestimonial->video_path) }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <video id="preview_video" class="mt-2 border rounded hidden" style="height: 100px;"
                        controls></video>
                @endif
            </div>

            <button type="submit" class="w-full mt-4 p-2 bg-blue-600 text-white rounded">Update</button>
        </form>

    </div>
</x-app-layout>

<script>
    var loadFile = function(event) {

        var input = event.target;
        var file = input.files[0];
        var type = file.type;

        var output = document.getElementById('preview_img');


        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };


    function previewVideo(event) {
        const file = event.target.files[0];
        const video = document.getElementById('preview_video');

        if (file && file.type.startsWith("video/")) {
            const url = URL.createObjectURL(file);
            video.src = url;
            video.classList.remove("hidden");
            video.load();
            video.play(); // autoplay preview
            video.onloadeddata = () => URL.revokeObjectURL(url);
        }
    }
</script>
