@extends('frontend.layout.front-layout')
@section('content')
    <!-- Hero Section -->
    <div class="hero-slider relative !mb-0">
        @foreach ($banners as $banner)
            @if ($banner->type === 'image')
                <!-- Image Banner -->
                <div class="slide relative h-[450px] flex items-center justify-center bg-cover bg-center"
                    style="background-image: url('{{ $banner->image ? asset('uploads/' . $banner->image) : asset('photo/default-banner.jpg') }}');">
                    <div class="absolute inset-0 bg-black/60"></div>
                    <div
                        class="relative z-10 text-center px-4 max-w-4xl mx-auto text-white h-full flex flex-col justify-center">
                        <h1 class="font-playfair font-bold text-3xl sm:text-5xl lg:text-6xl mb-4">
                            {{ $banner->title }}
                        </h1>
                        <p class="font-roboto text-base sm:text-lg lg:text-xl mb-8">
                            {{ $banner->sub_title }}
                        </p>
                        <div class="flex gap-4 justify-center">
                            <a href="{{ route('courses') }}"
                                class="px-6 md:px-8 py-3 bg-brand-red hover:bg-red-800 rounded-full font-roboto font-medium transition">
                                Explore Courses
                            </a>
                            <a href="#"
                                class="px-6 md:px-8 py-3 border-2 border-white hover:bg-white hover:text-brand-dark rounded-full font-roboto font-medium transition">
                                Free Consultation
                            </a>
                        </div>
                    </div>
                </div>
            @elseif($banner->type === 'video' && $banner->video_url)
                <!-- Video Banner -->
                <div class="slide video-slide relative h-[450px] flex items-center justify-center">
                    <div class="video-wrapper absolute inset-0 overflow-hidden">
                        <iframe class="w-full h-full"
                            src="{{ $banner->video_url }}?mute=1&loop=1&playlist={{ \Illuminate\Support\Str::afterLast($banner->video_url, '/') }}&modestbranding=1&rel=0"
                            title="Hero video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Courses Section -->
    <section id="courses" class="w-full py-12 lg:py-16 bg-gray-100">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Intro -->
            <div class="text-center mb-12">
                <span
                    class="inline-block bg-brand-orange/10 text-brand-orange px-4 py-2 rounded-full text-xs sm:text-sm font-roboto font-medium wow animate__animated animate__fadeInDown animate__faster"
                    data-wow-delay="0.1s">
                    Our Courses
                </span>
                <h2 class="mt-4 font-playfair font-bold text-2xl xs:text-3xl sm:text-4xl lg:text-5xl xl:text-6xl text-brand-dark wow animate__animated animate__fadeInDown animate__faster"
                    data-wow-delay="0.2s">
                    Our Spiritual Courses
                </h2>
                <p class="mt-2 font-roboto text-sm sm:text-base lg:text-lg xl:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed wow animate__animated animate__fadeInDown animate__faster"
                    data-wow-delay="0.3s">
                    Transformative Learning in Astrology, Palmistry & Vastu with Expert
                    Guidance and Lifetime Support
                </p>
            </div>

            <!-- Courses Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($courses as $row)
                    <!-- Course 1 -->
                    <a href="{{ route('course.learning', $row->slug) }}"
                        class="bg-white rounded-3xl border-2 border-brand-orange overflow-hidden transform transition-transform duration-300 hover:shadow-xl hover:-translate-y-1 wow animate__animated animate__slideInUp animate__faster"
                        data-wow-delay="0.1s">
                        <div class="p-4 lg:p-6">
                            <img src="{{ $row->featured_image ? asset('uploads/' . $row->featured_image) : asset('photo/default-banner.jpg') }}"
                                alt="Infinite Astrology" class="w-full h-48 lg:h-56 object-cover rounded-lg mb-4"
                                loading="lazy" decoding="async" />
                            <h3 class="font-roboto font-bold text-lg lg:text-xl text-black text-center mb-3">
                                {{ $row->title ?? '' }}
                            </h3>
                            <p class="font-roboto text-sm lg:text-base text-black mb-6">
                                {!! $row->short_description ?? '' !!}
                            </p>
                            <!-- Price -->
                            <div class="flex items-baseline justify-center gap-3 mb-4">
                                <span
                                    class="font-roboto text-sm lg:text-base text-gray-400 line-through">₹{{ $row->mrp ?? '' }}</span>
                                <span
                                    class="font-roboto font-bold text-xl lg:text-2xl text-black">₹{{ $row->sellable_price ?? '' }}</span>
                            </div>

                            <button
                                class="w-full h-12 lg:h-14 bg-brand-orange hover:bg-orange-600 rounded-lg text-white font-roboto text-lg lg:text-xl transition-colors enroll-button">
                                Enroll Now
                            </button>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Video Testimonials Section -->
    <section id="video-testimonials" class="w-full py-12 sm:py-16 lg:py-20 xl:py-24 bg-white px-6 md:px-4">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="text-center md:mb-12">
                <div class="inline-block mb-3 sm:mb-4">
                    <span
                        class="bg-brand-orange/10 text-brand-orange px-4 py-2 rounded-full text-xs sm:text-sm font-roboto font-medium">
                        Video Testimonials
                    </span>
                </div>
                <h2
                    class="font-playfair font-bold text-2xl xs:text-3xl sm:text-4xl lg:text-5xl xl:text-6xl text-brand-dark mb-3 sm:mb-4 lg:mb-6">
                    Hear From Our Students
                </h2>
                <p
                    class="font-roboto text-sm sm:text-base lg:text-lg xl:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Watch real experiences about learning Astrology, Palmistry and Vastu
                    with BSIA.
                </p>
            </div>

            <div class="video-reviews-slider">
                {{-- @foreach ($videotestimonial as $row)
                    <div class="relative w-full pb-[56.25%]">
                        <video controls
                            poster="{{ $row->image ? asset('uploads/' . $row->image) : asset('photo/default-banner.jpg') }}"
                            class="absolute top-0 left-0 w-full h-full object-cover rounded-lg shadow-lg">
                            <source src="{{ asset('uploads/testimonialvideos/' . $row->video_path) }}" type="video/mp4">
                            Your browser does not support the video files.
                        </video>
                        <div class="px-4 py-3 bg-gray-50 border-t text-center">
                            <p class="font-roboto text-sm lg:text-base font-medium text-blue-900">
                                {{ $row->name ?? '' }},
                                <span class="text-gray-700">{{ $row->location ?? '' }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach --}}
                <!-- Local Video 1 -->
                @foreach ($videotestimonial as $row)
                    <div class="px-2 sm:px-3">
                        <div
                            class="group bg-white rounded-2xl mb-4 border border-gray-200 overflow-hidden hover:shadow-2xl transition-all duration-300">
                            <div class="video-card">
                                <div class="local-video-thumb absolute inset-0 cursor-pointer flex items-center justify-center"
                                    data-video-src="{{ asset('uploads/testimonialvideos/' . $row->video_path) }}"
                                    data-poster="{{ $row->image ? asset('uploads/' . $row->image) : asset('photo/default-banner.jpg') }}"
                                    aria-label="Play video testimonial 1">
                                    <img src="{{ $row->image ? asset('uploads/' . $row->image) : asset('photo/default-banner.jpg') }}"
                                        alt="Video testimonial 1" class="w-full h-full object-cover" loading="lazy"
                                        decoding="async" />
                                    <button class="yt-play-button" aria-hidden="true"></button>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 border-t text-center">
                                <p class="font-roboto text-sm lg:text-base font-medium text-blue-900">
                                    {{ $row->name ?? '' }},
                                    <span class="text-gray-700">{{ $row->location ?? '' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="w-full py-12 sm:py-16 lg:py-20 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Title -->
            <div class="text-center mb-5 md:mb-12">
                <div class="inline-block mb-3 sm:mb-4">
                    <span
                        class="bg-brand-orange/10 text-brand-orange px-4 py-2 rounded-full text-xs sm:text-sm font-roboto font-medium">
                        About Us
                    </span>
                </div>
                <h2
                    class="font-playfair font-bold text-2xl xs:text-3xl sm:text-4xl lg:text-5xl xl:text-6xl text-brand-dark mb-3 sm:mb-4 lg:mb-6">
                    {{ $about->title ?? '' }}
                </h2>
                <p
                    class="font-roboto text-sm sm:text-base lg:text-lg xl:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{ $about->sub_title ?? '' }}
                </p>
            </div>

            <div class="flex flex-col lg:flex-row items-center gap-8">
                <!-- Left Image -->
                <div class="lg:w-1/2 wow animate__fadeInLeft">
                    <img src="{{ $about && $about->image ? asset('uploads/' . $about->image) : asset('photo/default-banner.jpg') }}"
                        alt="About BSIA" class="w-full h-auto rounded-2xl shadow-2xl object-cover" loading="lazy"
                        decoding="async" />
                </div>

                <!-- Right Content -->
                <div class="lg:w-1/2 space-y-6 wow animate__fadeInRight" data-wow-delay="0.3s">
                    <div>
                        <p class="font-playfair font-semibold text-xl text-brand-red">
                            {!! $about->description ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
    </section>

    <!-- Stats Section -->
    <section class="relative w-full py-12 bg-cover bg-center"
        style="background-image: url('{{ asset('photo/background.jpg') }}');">
        <!-- Overlay -->
        <div class="absolute inset-0"
            style="
          background: radial-gradient(
            circle at center,
            rgba(0, 0, 0, 0.8),
            rgba(0, 0, 0, 0.8)
          );
        ">
        </div>

        <div class="relative z-10 container mx-auto px-4 max-w-7xl">
            <!-- change flex → grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-4 lg:gap-8">
                <!-- Stat Card 1 -->
                <div class="flex items-center gap-3 border border-white rounded-lg p-4 md:p-5 transform transition-all duration-700 ease-out hover:scale-105 hover:bg-white/20 hover:backdrop-blur-lg hover:shadow-xl cursor-pointer wow animate__bounceIn"
                    data-wow-delay="0.1s">
                    <img src="{{ asset('photo/s1.png') }}" alt="Success icon"
                        class="w-12 h-12 sm:w-12 sm:h-12 md:w-14 md:h-14" loading="lazy" decoding="async" />
                    <div>
                        <h3 class="text-white font-playfair font-bold text-xl md:text-2xl">
                            100%
                        </h3>
                        <p class="text-white font-roboto text-sm md:text-base">
                            Success rate
                        </p>
                    </div>
                </div>
                <!-- Stat Card 2 -->
                <div class="flex items-center gap-3 border border-white rounded-lg p-4 md:p-5 transform transition-all duration-700 ease-out hover:scale-105 hover:bg-white/20 hover:backdrop-blur-lg hover:shadow-xl cursor-pointer wow animate__bounceIn"
                    data-wow-delay="0.3s">
                    <img src="{{ asset('photo/5-years.svg') }}" alt="Experience icon"
                        class="w-12 h-12 sm:w-12 sm:h-12 md:w-14 md:h-14" loading="lazy" decoding="async" />
                    <div>
                        <h3 class="text-white font-playfair font-bold text-xl md:text-2xl">
                            05+
                        </h3>
                        <p class="text-white font-roboto text-sm md:text-base">
                            Years of experience
                        </p>
                    </div>
                </div>
                <!-- Stat Card 3 -->
                <div class="flex items-center gap-3 border border-white rounded-lg p-4 md:p-5 transform transition-all duration-700 ease-out hover:scale-105 hover:bg-white/20 hover:backdrop-blur-lg hover:shadow-xl cursor-pointer wow animate__bounceIn"
                    data-wow-delay="0.1s">
                    <img src="{{ asset('photo/students.svg') }}" alt="Students icon"
                        class="w-12 h-12 sm:w-12 sm:h-12 md:w-14 md:h-14" loading="lazy" decoding="async" />
                    <div>
                        <h3 class="text-white font-playfair font-bold text-xl md:text-2xl">
                            2000+
                        </h3>
                        <p class="text-white font-roboto text-sm md:text-base">
                            Students
                        </p>
                    </div>
                </div>
                <!-- Stat Card 4 -->
                <div class="flex items-center gap-3 border border-white rounded-lg p-4 md:p-5 transform transition-all duration-700 ease-out hover:scale-105 hover:bg-white/20 hover:backdrop-blur-lg hover:shadow-xl cursor-pointer wow animate__bounceIn"
                    data-wow-delay="0.3s">
                    <img src="{{ asset('photo/iso.svg') }}" alt="ISO icon"
                        class="w-12 h-12 sm:w-12 sm:h-12 md:w-14 md:h-14" loading="lazy" decoding="async" />
                    <div>
                        <h3 class="text-white font-playfair font-bold text-xl md:text-2xl">
                            ISO
                        </h3>
                        <p class="text-white font-roboto text-sm md:text-base">
                            Certified
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials"
        class="w-full py-12 sm:py-16 lg:py-20 xl:py-24 bg-gradient-to-b from-gray-50 to-white px-6 md:px-4">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Header -->
            <div class="text-center md:mb-12">
                <div class="inline-block mb-3 sm:mb-4">
                    <span
                        class="bg-brand-orange/10 text-brand-orange px-4 py-2 rounded-full text-xs sm:text-sm font-roboto font-medium">
                        Testimonials
                    </span>
                </div>
                <h2
                    class="font-playfair font-bold text-2xl xs:text-3xl sm:text-4xl lg:text-5xl xl:text-6xl text-brand-dark mb-3 sm:mb-4 lg:mb-6">
                    What Our Students Say
                </h2>
                <p
                    class="font-roboto text-sm sm:text-base lg:text-lg xl:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Real Stories from Those Who Found Clarity and Guidance Through Our
                    Courses
                </p>
            </div>

            <!-- Slider wrapper -->
            <div class="testimonials-slider">
                <!-- Slide 1 -->
                @foreach ($testimonial as $test)
                    <div class="px-2 sm:px-3 wow animate__fadeInUp" data-wow-duration="0.7s">
                        <div
                            class="testimonial-card relative bg-white rounded-3xl border p-6 sm:p-8 mt-12 shadow-lg transition-shadow duration-300">
                            <div class="absolute -top-[65px] left-1/2 transform -translate-x-1/2">
                                <img src="{{ $test->image ? asset('uploads/' . $test->image) : asset('photo/default-banner.jpg') }}"
                                    alt="" class="w-24 h-24 rounded-full border-[5px] border-white shadow-xl"
                                    loading="lazy" decoding="async" />
                            </div>
                            <div class="pt-2 text-center">
                                <div class="flex justify-center mb-4 text-brand-gold text-lg">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <p class="font-roboto text-base text-gray-700 mb-4 leading-relaxed">
                                    {!! $test->review ?? '' !!}
                                </p>
                                <h4 class="font-roboto font-bold text-brand-dark">{{ $test->name ?? '' }}</h4>
                                <p class="font-roboto text-sm text-gray-500">
                                    {{ $test->profession ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Add more slides as needed -->
            </div>
        </div>
    </section>
@endsection
