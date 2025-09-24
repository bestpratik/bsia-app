@extends('frontend.layout.front-layout')
@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3 border-b border-gray-200">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex overflow-x-auto pb-2 hide-scrollbar" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 flex-nowrap">
                    <li class="inline-flex items-center flex-shrink-0">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-brand-red">
                            <i class="fas fa-home mr-2"></i>
                            <span class="whitespace-nowrap">Home</span>
                        </a>
                    </li>
                    <li class="flex-shrink-0">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <a href="{{ route('courses') }}"
                                class="text-sm font-medium text-gray-700 hover:text-brand-red whitespace-nowrap">
                                Courses
                            </a>
                        </div>
                    </li>
                    {{-- <li class="flex-shrink-0">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <a href="{{ route('course.details', $learning->slug) }}"
                                class="text-sm font-medium text-gray-700 hover:text-brand-red whitespace-nowrap">
                                <span class="hidden xs:inline">{{ $learning->title }}</span>
                                <span class="xs:hidden">Astrology</span>
                            </a>
                        </div>
                    </li> --}}
                    <li aria-current="page" class="flex-shrink-0">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-brand-red whitespace-nowrap">
                                <span class="hidden xs:inline">Course Overview</span>
                                <span class="xs:hidden">Overview</span>
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Course Learning Content -->
    <main class="">
        <section class="bg-gradient-to-br from-brand-dark via-brand-red to-red-900 bg-cover bg-center py-10 md:py-16">
            <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <!-- Video -->

                <div class="w-full">
                    @if (!empty($courses) && !empty($courses->video_path))
                        <video class="w-full rounded-2xl shadow-xl border-4 border-white/10" controls>
                            <source src="{{ asset('uploads/testimonialvideos/' . $courses->video_path) }}"
                                type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <p class="text-gray-500">No video available</p>
                    @endif
                </div>


                <!-- Text -->
                <div class="text-white md:pl-8 text-center md:text-left">
                    <h1 class="text-3xl md:text-5xl font-playfair font-bold leading-tight mb-6">
                        {{ $learning->title }} <br />
                        Course
                    </h1>
                    <a href="{{ route('purchase.form', ['type' => 'course', 'id' => $learning->id]) }}"
                        class="inline-block bg-gradient-to-r from-brand-orange to-brand-gold text-white hover:from-brand-gold hover:to-brand-orange font-roboto font-medium px-8 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        Enroll Now
                    </a>
                    <button
                        class="ml-4 inline-flex items-center py-3 px-6 border-2 border-brand-yellow text-brand-gold rounded-lg hover:bg-brand-red hover:text-white transition-all duration-300 font-medium transform hover:scale-105">
                        <i class="far fa-heart mr-2"></i>
                        Add to Wishlist
                    </button>
                </div>
            </div>
        </section>
        <!-- Icon Navigation Row -->
        <div class="py-6 px-4 md:px-8 max-w-7xl mx-auto border-b border-gray-100">
            <div class="flex flex-wrap justify-center gap-4 md:gap-8 text-brand-dark text-sm md:text-base font-roboto">
                <a href="#overview"
                    class="flex items-center gap-2 hover:text-brand-red transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-eye text-[#900807]"></i> Overview
                </a>
                <a href="#content"
                    class="flex items-center gap-2 hover:text-brand-red transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-book-open text-[#900807]"></i> Content
                </a>
                <a href="#instructor"
                    class="flex items-center gap-2 hover:text-brand-red transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-chalkboard-teacher text-[#900807]"></i> Instructor
                </a>
                <a href="#reviews"
                    class="flex items-center gap-2 hover:text-brand-red transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-star text-[#900807]"></i> Reviews
                </a>
                <a href="#enroll"
                    class="flex items-center gap-2 hover:text-brand-red transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-shopping-cart text-[#900807]"></i> Enroll
                </a>
                <a href="#faqs"
                    class="flex items-center gap-2 hover:text-brand-red transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-question-circle text-[#900807]"></i> FAQs
                </a>
            </div>
        </div>

        <section class="py-12 px-4 md:px-8 max-w-7xl mx-auto" id="overview">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Left Column (About the Course) -->
                <div class="md:col-span-2">
                    <span
                        class="inline-block bg-brand-orange/10 text-brand-orange px-4 py-2 rounded-full text-xs sm:text-sm font-roboto font-medium mb-2">ABOUT
                        THE COURSE</span>
                    <p class="text-gray-600 text-sm mb-4 font-roboto">
                        Beginner-friendly Vedic Astrology Program
                    </p>
                    <p class="mb-4 text-gray-700 font-roboto leading-relaxed text-sm sm:text-base">
                        {!! $learning->about_course !!}
                    </p>
                    {{-- <p class="mb-4 text-gray-700 font-roboto leading-relaxed text-sm sm:text-base">
                        Whether you're a curious learner, a spiritual seeker, or someone
                        who wants to start a new journey in astrology — this course will
                        equip you with the essential knowledge to read and interpret
                        horoscopes, make simple predictions, and discover the unseen
                        forces shaping your reality. With a practical learning approach,
                        interactive examples, and real-life references, you’ll find
                        yourself truly connected to the stars.
                    </p> --}}

                    <!-- Why Join -->
                    <h3 class="mt-8 mb-4 text-xl sm:text-2xl font-playfair font-bold text-brand-dark">
                        Why should you join this course?
                    </h3>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                        @foreach (preg_split('/\r\n|\r|\n/', trim($learning->why_join_the_course)) as $index => $line)
                            @if (str_contains($line, ':'))
                                @php
                                    [$title, $desc] = explode(':', $line, 2);
                                    $title = trim($title);
                                    $desc = trim($desc);

                                    // Assign background colors by index
                                    $bgClasses = [
                                        'bg-[#3d0000] text-white', // 1st card (dark red)
                                        'bg-brand-orange/10 text-gray-800', // 2nd card
                                        'bg-brand-red text-white', // 3rd card
                                        'bg-gray-100 text-gray-800', // 4th card
                                    ];
                                    $class = $bgClasses[$index % count($bgClasses)];
                                @endphp

                                <div
                                    class="{{ $class }} p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <h4 class="font-roboto font-medium mb-2 text-base sm:text-lg">
                                        {!! $title !!}
                                    </h4>
                                    <p
                                        class="text-sm font-roboto {{ str_contains($class, 'text-white') ? 'text-white/90' : '' }}">
                                        {!! $desc !!}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- <div
                            class="bg-brand-orange/10 text-gray-800 p-4 sm:p-5 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <h4 class="font-roboto font-medium mb-2 text-base sm:text-lg">
                                Bengali Medium
                            </h4>
                            <p class="text-sm font-roboto">
                                Simple, conversational explanations in Bengali for easy
                                understanding.
                            </p>
                        </div>
                        <div
                            class="bg-brand-red text-white p-4 sm:p-5 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <h4 class="font-roboto font-medium mb-2 text-base sm:text-lg">
                                Decode Your Life
                            </h4>
                            <p class="text-sm text-white/90 font-roboto">
                                Understand planets, signs, houses, and their meanings in your
                                own chart.
                            </p>
                        </div>
                        <div
                            class="bg-gray-100 text-gray-800 p-4 sm:p-5 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <h4 class="font-roboto font-medium mb-2 text-base sm:text-lg">
                                Chart Reading Basics
                            </h4>
                            <p class="text-sm font-roboto">
                                Start analyzing charts confidently and gain a high-paying
                                skill.
                            </p>
                        </div> --}}
                </div>

                <!-- Right Column (Course Details) -->
                <div class="lg:col-span-1">
                    <!-- Course Info Card -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden sticky top-24 wow animate__animated animate__fadeInUp">
                        @if ($learning->features->count() > 0)
                            <!-- Course Features -->
                            <div class="p-6">
                                <h3 class="font-bold text-lg text-brand-dark mb-4">
                                    This Course Includes:
                                </h3>
                                <ul class="space-y-3">
                                    @foreach ($learning->features as $feature)
                                        <li class="flex items-center text-gray-700">
                                            <i class="{{ $feature->icon }} mr-3"></i>
                                            <span>{{ $feature->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @php
                            $currentUrl = urlencode(Request::url());
                            $pageTitle = urlencode(
                                'BS Institute of Astrology - Learn Astrology, Palmistry & Vastu Online',
                            );
                        @endphp
                        <!-- Share Section -->
                        <div class="p-6 border-t border-gray-100">
                            <h3 class="font-bold text-lg text-brand-dark mb-4">
                                Share This Course:
                            </h3>
                            <div class="flex space-x-3">

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}" target="_blank"
                                    rel="noopener"
                                    class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors"
                                    title="Share on Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <!-- Twitter -->
                                <a href="https://twitter.com/intent/tweet?url={{ $currentUrl }}&text={{ $pageTitle }}"
                                    target="_blank" rel="noopener"
                                    class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors"
                                    title="Tweet on Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>

                                <!-- LinkedIn -->
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $currentUrl }}"
                                    target="_blank" rel="noopener"
                                    class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors"
                                    title="Share on LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>

                                <!-- WhatsApp -->
                                <a href="https://api.whatsapp.com/send?text={{ $pageTitle }}%20{{ $currentUrl }}"
                                    target="_blank" rel="noopener"
                                    class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors"
                                    title="Share on WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>

                                {{-- <a href="#"
                                 class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors">
                                 <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="#"
                                 class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors">
                                 <i class="fab fa-twitter"></i>
                             </a>
                             <a href="#"
                                 class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors">
                                 <i class="fab fa-linkedin-in"></i>
                             </a>
                             <a href="#"
                                 class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-brand-red hover:text-white transition-colors">
                                 <i class="fab fa-whatsapp"></i>
                             </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enroll Button -->
            <div class="mt-10 text-center">
                <a href="{{ route('purchase.form', ['type' => 'course', 'id' => $learning->id]) }}"
                    class="inline-block bg-brand-orange hover:bg-brand-orange/90 text-white font-roboto font-medium px-8 py-3 rounded-full transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-lg">
                    Enroll Now - ₹{{ $learning->sellable_price }}
                </a>
            </div>
        </section>

        <!-- Course Lessons Accordion -->
        <section class="max-w-7xl mx-auto p-4 md:p-4" id="content">
            <div class="text-center mb-10">
                <span
                    class="inline-block bg-brand-orange/10 text-brand-orange px-4 py-2 rounded-full text-xs sm:text-sm font-roboto font-medium mb-2">COURSE
                    CONTENT</span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-playfair font-bold text-brand-dark">
                    Course Lessons
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2 max-w-2xl mx-auto font-roboto">
                    Master the fundamentals of numerology with our structured curriculum
                </p>
            </div>

            <!-- Accordion Item -->
            @foreach ($modules as $mIndex => $module)
                <div class="border-b border-gray-200 hover:border-brand-orange/30 transition-colors duration-300">
                    <button
                        class="w-full flex items-center justify-between py-4 sm:py-5 text-left text-lg font-medium text-brand-dark focus:outline-none accordion-header hover:text-brand-red transition-colors duration-300">

                        <!-- Left Number + Title -->
                        <div class="flex items-center gap-3 sm:gap-4">
                            <span
                                class="bg-brand-red text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center text-sm sm:text-base font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                {{ str_pad($mIndex + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <span class="font-playfair text-lg sm:text-xl">{{ $module->name }}</span>
                        </div>

                        <!-- Icon -->
                        <span
                            class="transition-transform duration-300 accordion-icon text-brand-gold text-xl sm:text-2xl">➖</span>
                    </button>

                    <!-- Accordion Content -->
                    <div class="accordion-content pb-4 pl-4 sm:pl-16 space-y-4">
                        <!-- Module Description -->
                        {{-- <p class="text-gray-700 font-roboto">{!! $module->description !!}</p> --}}

                        <!-- Lessons List -->
                        @if ($module->lessons->count())
                            <ul class="space-y-2">
                                @foreach ($module->lessons as $lesson)
                                    <li class="flex items-center text-gray-700">
                                        @if ($lesson->type == 'video')
                                            <i class="fas fa-play-circle text-brand-orange mr-3"></i>
                                        @else
                                            <i class="fas fa-file-alt text-brand-blue mr-3"></i>
                                        @endif

                                        @guest
                                            <!-- Guest (Not logged in) -->
                                            <button onclick="showEnrollPopup()"
                                                class="text-brand-dark hover:text-brand-red transition">
                                                {{ $lesson->title }}
                                            </button>
                                        @else
                                            <!-- Logged in -->
                                            <a href="" class="text-brand-dark hover:text-brand-orange transition">
                                                {{ $lesson->title }}
                                            </a>
                                        @endguest

                                        @if ($lesson->type == 'video')
                                            {{-- <span class="ml-auto text-gray-500 text-sm">
                    {{ $lesson->duration ?? '' }} min
                </span> --}}
                                        @else
                                            <span class="ml-auto text-gray-500 text-sm">Reading</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Quiz Item -->
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-tasks text-brand-purple mr-3"></i>
                                @guest
                                    <button onclick="showEnrollPopup()"
                                        class="text-brand-dark hover:text-brand-red transition">
                                        Module {{ $mIndex + 1 }} Quiz
                                    </button>
                                @else
                                    <a href="" class="text-brand-dark hover:text-brand-orange transition">
                                        Module {{ $mIndex + 1 }} Quiz
                                    </a>
                                @endguest

                                <span class="ml-auto text-gray-500 text-sm">Quiz</span>
                            </li>
                        @else
                            <p class="text-sm text-gray-500 italic">No lessons available in this module.</p>
                        @endif

                        {{-- <!-- Quiz Item -->
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-tasks text-brand-purple mr-3"></i>
                            <span>Module {{ $mIndex + 1 }} Quiz</span>
                            <span class="ml-auto text-gray-500 text-sm">Quiz</span>
                        </li> --}}
                    </div>
                </div>
            @endforeach

            {{-- <!-- Repeat for Module 2 -->
            <div class="border-b border-gray-200 hover:border-brand-orange/30 transition-colors duration-300">
                <button
                    class="w-full flex items-center justify-between py-4 sm:py-5 text-left text-lg font-medium text-brand-dark focus:outline-none accordion-header hover:text-brand-red transition-colors duration-300">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <span
                            class="bg-brand-orange text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center text-sm sm:text-base font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">02</span>
                        <span class="font-playfair text-lg sm:text-xl">Planets & Their Influence</span>
                    </div>
                    <span
                        class="transition-transform duration-300 accordion-icon text-brand-gold text-xl sm:text-2xl">➕</span>
                </button>
                <div class="accordion-content hidden pb-4 pl-14 sm:pl-16">
                    <ul class="space-y-3 text-gray-700">
                        <li
                            class="flex justify-between border-b border-gray-100 pb-3 hover:bg-gray-50 px-2 py-1 rounded-lg">
                            <span class="font-roboto"><i class="fas fa-play-circle text-brand-red mr-2"></i>
                                Grahas: The Nine Planets</span>
                            <span class="text-gray-500 font-roboto">15:20</span>
                        </li>
                        <li class="flex justify-between hover:bg-gray-50 px-2 py-1 rounded-lg">
                            <span class="font-roboto"><i class="fas fa-file-alt text-brand-gold mr-2"></i>
                                Planetary Influence Notes (Bengali)</span>
                            <span class="text-gray-500 font-roboto">10 Pages</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Repeat for Module 3 -->
            <div class="border-b border-gray-200 hover:border-brand-orange/30 transition-colors duration-300">
                <button
                    class="w-full flex items-center justify-between py-4 sm:py-5 text-left text-lg font-medium text-brand-dark focus:outline-none accordion-header hover:text-brand-red transition-colors duration-300">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <span
                            class="bg-brand-gold text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center text-sm sm:text-base font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">03</span>
                        <span class="font-playfair text-lg sm:text-xl">Module 3</span>
                    </div>
                    <span
                        class="transition-transform duration-300 accordion-icon text-brand-gold text-xl sm:text-2xl">➕</span>
                </button>
                <div class="accordion-content hidden pb-4 pl-14 sm:pl-16">
                    <ul class="space-y-3 text-gray-700">
                        <li
                            class="flex justify-between border-b border-gray-100 pb-3 hover:bg-gray-50 px-2 py-1 rounded-lg transition-all duration-300 hover:shadow-sm">
                            <span class="font-roboto"><i
                                    class="fas fa-play-circle text-brand-red mr-2 transition-transform duration-300 transform group-hover:scale-110"></i>
                                Planets & Numbers</span>
                            <span class="text-gray-500 font-roboto">11:14</span>
                        </li>
                        <li
                            class="flex justify-between hover:bg-gray-50 px-2 py-1 rounded-lg transition-all duration-300 hover:shadow-sm">
                            <span class="font-roboto"><i
                                    class="fas fa-question-circle text-brand-orange mr-2 transition-transform duration-300 transform group-hover:scale-110"></i>
                                Quiz 3</span>
                            <span class="text-gray-500 font-roboto">5 questions</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Repeat for Module 4 -->
            <div class="border-b border-gray-200 hover:border-brand-orange/30 transition-colors duration-300">
                <button
                    class="w-full flex items-center justify-between py-4 sm:py-5 text-left text-lg font-medium text-brand-dark focus:outline-none accordion-header hover:text-brand-red transition-colors duration-300">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <span
                            class="bg-brand-purple text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center text-sm sm:text-base font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">04</span>
                        <span class="font-playfair text-lg sm:text-xl">Module 4</span>
                    </div>
                    <span
                        class="transition-transform duration-300 accordion-icon text-brand-gold text-xl sm:text-2xl">➕</span>
                </button>
                <div class="accordion-content hidden pb-4 pl-14 sm:pl-16">
                    <ul class="space-y-3 text-gray-700">
                        <li
                            class="flex justify-between hover:bg-gray-50 px-2 py-1 rounded-lg transition-all duration-300 hover:shadow-sm">
                            <span class="font-roboto"><i
                                    class="fas fa-play-circle text-brand-red mr-2 transition-transform duration-300 transform group-hover:scale-110"></i>
                                Psychic & Destiny Number</span>
                            <span class="text-gray-500 font-roboto">07:02</span>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </section>

        <!-- Enroll Popup -->
        <div id="enrollPopup" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-xl shadow-lg text-center max-w-sm">
                <h2 class="text-xl font-bold mb-4 text-brand-dark">Please Enroll</h2>
                <p class="text-gray-600 mb-6">You must enroll or log in to access this content.</p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-brand-red text-white rounded-lg shadow hover:bg-brand-dark transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-brand-orange text-white rounded-lg shadow hover:bg-brand-dark transition">
                        Enroll Now
                    </a>
                </div>
                <button onclick="closeEnrollPopup()" class="mt-4 text-gray-500 hover:text-gray-700">Close</button>
            </div>
        </div>

        <section class="bg-gradient-to-b from-brand-orange/5 to-brand-red/5 py-16 px-4" id="instructor">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-10">
                <!-- Image -->
                <div class="flex justify-center">
                    <img src="https://astrosoumalyapathak.com/uploads/banner/1735046378.png" alt="Sujit Pathak"
                        class="w-64 h-64 rounded-full object-cover shadow-lg" />
                </div>

                <!-- Text -->
                <div>
                    <p class="text-sm sm:text-base text-brand-orange font-medium mb-2">
                        Meet your Mentor
                    </p>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-playfair text-brand-dark mb-4 relative inline-block">
                        {{ $learning->instructor_name }} – {{ $learning->instructor_designation }}
                        <span
                            class="absolute bottom-[-4px] left-0 w-full h-1 bg-gradient-to-r from-brand-orange to-brand-red"></span>
                    </h2>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4">
                        {!! $learning->instructor_details !!}
                    </p>
                    {{-- <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4">
                        Recognized as the “Most Trusted Astrologer” in North 24 Parganas,
                        Sujit has expanded his practice nationwide and overseas, with
                        clients in Singapore, Thailand, and beyond. His unique style
                        blends classical astrology texts with modern consultative
                        techniques, offering gemstone suggestions, yantras, Rudraksha
                        therapies, color guidance, and charitable remedies.
                    </p>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                        Author of the popular Bengali numerology guide
                        <em class="text-brand-orange font-medium">Sankhyar Khela</em>,
                        Sujit is a regular at Jyotish forums and lectures across India and
                        Southeast Asia. Students love his clear, practical, and
                        transformative teaching style.
                    </p> --}}
                </div>
            </div>
        </section>

        <main class="py-8 md:py-12 bg-gray-50">
            <div class="container mx-auto px-4 max-w-7xl">
                @if ($relatedCourses->count() > 0)
                    <!-- Related Courses -->
                    <div class="mt-12 md:mt-16 wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                        <h2 class="font-playfair font-bold text-2xl md:text-3xl text-brand-dark mb-8">
                            Related Courses
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Course 1 -->
                            @foreach ($relatedCourses as $related)
                                <div>
                                    <a href="{{ route('course.learning', $related->slug) }}">
                                        <div
                                            class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                            <img src="{{ asset('uploads/' . $related->featured_image) }}"
                                                alt="{{ $related->title }}" class="w-full h-48 object-cover"
                                                loading="lazy" decoding="async" />
                                            <div class="p-5">
                                                <h3 class="font-roboto font-bold text-lg text-brand-dark mb-2">
                                                    {{ $related->title }}
                                                </h3>
                                                <p class="text-gray-600 text-sm mb-4">
                                                    {!! Str::limit($related->short_description, 100) !!}</p>
                                                <div class="flex justify-between items-center">
                                                    <span
                                                        class="text-brand-red font-bold">₹{{ number_format($related->sellable_price) }}</span>
                                                    <a href="{{ route('course.learning', $related->slug) }}"
                                                        class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-brand-dark transition-colors text-sm font-medium">Enroll</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </main>

        <section class="testimonial-section text-center py-12 sm:py-16 bg-gray-50" id="reviews">
            <div class="container mx-auto px-4">
                <p class="text-sm sm:text-base text-brand-orange font-medium mb-2">
                    What Our Students Say
                </p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-playfair text-brand-dark mb-8 relative inline-block">
                    Happy Student Testimonials
                    <span
                        class="absolute bottom-[-4px] left-0 w-full h-1 bg-gradient-to-r from-brand-orange to-brand-red"></span>
                </h2>

                <div class="testimonial-slider max-w-4xl mx-auto">
                    @foreach ($testimonial as $test)
                        <div
                            class="bg-white p-6 sm:p-8 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 mx-2 my-4">
                            <div class="mb-4">
                                <i class="fas fa-quote-left text-3xl text-brand-orange/20"></i>
                            </div>
                            <p class="text-gray-700 text-sm sm:text-base mb-6 italic">
                                {!! $test->review !!}
                            </p>
                            <div class="flex items-center justify-center">
                                <div
                                    class="w-24 h-24 rounded-full bg-brand-orange/20 flex items-center justify-center mr-3">
                                    <span class="text-brand-orange font-bold text-sm">{{ $test->profession }}</span>
                                </div>
                                <div class="text-left">
                                    <p class="font-medium text-brand-dark">{{ $test->name }}</p>
                                    <div class="flex text-brand-gold">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div
                        class="bg-white p-6 sm:p-8 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 mx-2 my-4">
                        <div class="mb-4">
                            <i class="fas fa-quote-left text-3xl text-brand-orange/20"></i>
                        </div>
                        <p class="text-gray-700 text-sm sm:text-base mb-6 italic">
                            The teaching style was so clear and inspiring. I feel more
                            confident applying numerology concepts in real life now, as each
                            lesson was thoughtfully structured and easy to understand. The
                            examples and explanations kept me motivated throughout, making
                            the entire experience both educational and enjoyable.
                        </p>
                        <div class="flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-brand-orange/20 flex items-center justify-center mr-3">
                                <span class="text-brand-orange font-bold text-xl">RS</span>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-brand-dark">Rahul Sharma</p>
                                <div class="flex text-brand-gold">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white p-6 sm:p-8 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 mx-2 my-4">
                        <div class="mb-4">
                            <i class="fas fa-quote-left text-3xl text-brand-orange/20"></i>
                        </div>
                        <p class="text-gray-700 text-sm sm:text-base mb-6 italic">
                            This was an excellent learning experience. The material was
                            presented in a way that was both engaging and practical, with
                            real-life applications that made the subject come alive. I
                            appreciated the supportive approach of the instructor, which
                            helped me absorb the concepts with confidence.
                        </p>
                        <div class="flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-brand-orange/20 flex items-center justify-center mr-3">
                                <span class="text-brand-orange font-bold text-xl">PV</span>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-brand-dark">Priya Verma</p>
                                <div class="flex text-brand-gold">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="px-4 py-8 max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold text-center text-teal-800 mb-6">
                You Can Also Enroll
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                @foreach ($ebook as $row)
                    <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                        <a href="{{ route('ebook.details', ['slug' => $row->slug]) }}">
                            <img src="{{ asset('uploads/' . $row->featured_image) }}" alt="Course 1"
                                class="w-full h-auto rounded-lg mb-4" />
                            <h3 class="text-lg font-medium text-gray-800 text-center">
                                {{ $row->title }}
                            </h3>
                        </a>

                        <p class="text-lg font-semibold text-gray-900 mt-2">₹{{ $row->price }}</p>
                        <a href="{{ route('purchase.form', ['type' => 'ebook', 'id' => $row->id]) }}">
                            <button
                                class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                                Enroll
                            </button>
                        </a>
                    </div>
                @endforeach
                {{-- <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="images/courses/c1.jpg" alt="Course 2" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Air Signs in Astrology
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">
                        <span class="line-through text-gray-500 mr-1">₹499</span> ₹199
                    </p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="images/courses/c1.jpg" alt="Course 3" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Astrology Masterclass
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">₹299</p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="images/courses/c1.jpg" alt="Course 4" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Beginner's Vedic Astrology
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">₹399</p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
                </div>

                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="images/courses/c1.jpg" alt="Course 1" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Lal Kitab E-book
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">₹199</p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="images/courses/c1.jpg" alt="Course 2" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Air Signs in Astrology
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">
                        <span class="line-through text-gray-500 mr-1">₹499</span> ₹199
                    </p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="images/courses/c1.jpg" alt="Course 3" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Astrology Masterclass
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">₹299</p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="images/courses/c1.jpg" alt="Course 4" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Beginner's Vedic Astrology
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">₹399</p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
                </div> --}}
            </div>
        </section>

        <section class="bg-gradient-to-b from-brand-orange/5 to-brand-red/5 py-12 sm:py-16 px-6">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Left Content -->
                <div>
                    <p class="text-sm sm:text-base text-brand-orange font-medium mb-2">
                        Course Completion
                    </p>
                    <h2 class="text-2xl md:text-3xl lg:text-3xl font-playfair text-brand-dark mb-6 relative inline-block">
                        Receive a Certificate Upon Completion
                        <span
                            class="absolute bottom-[-4px] left-0 w-full h-1 bg-gradient-to-r from-brand-orange to-brand-red"></span>
                    </h2>
                    <ul class="space-y-4 text-gray-800 text-sm sm:text-base">
                        <li class="flex items-start gap-3 group transition-all duration-300 hover:translate-x-1">
                            <span
                                class="text-white bg-gradient-to-r from-brand-orange to-brand-red rounded-full w-6 h-6 flex items-center justify-center flex-shrink-0 shadow-sm group-hover:shadow-md transition-all duration-300">✓</span>
                            <span class="font-roboto">Certified Astrology Learner</span>
                        </li>
                        <li class="flex items-start gap-3 group transition-all duration-300 hover:translate-x-1">
                            <span
                                class="text-white bg-gradient-to-r from-brand-orange to-brand-red rounded-full w-6 h-6 flex items-center justify-center flex-shrink-0 shadow-sm group-hover:shadow-md transition-all duration-300">✓</span>
                            <span class="font-roboto">Practice-based lessons from Day 1</span>
                        </li>
                        <li class="flex items-start gap-3 group transition-all duration-300 hover:translate-x-1">
                            <span
                                class="text-white bg-gradient-to-r from-brand-orange to-brand-red rounded-full w-6 h-6 flex items-center justify-center flex-shrink-0 shadow-sm group-hover:shadow-md transition-all duration-300">✓</span>
                            <span class="font-roboto">Lifetime access to the course</span>
                        </li>
                        <li class="flex items-start gap-3 group transition-all duration-300 hover:translate-x-1">
                            <span
                                class="text-white bg-gradient-to-r from-brand-orange to-brand-red rounded-full w-6 h-6 flex items-center justify-center flex-shrink-0 shadow-sm group-hover:shadow-md transition-all duration-300">✓</span>
                            <span class="font-roboto">Learn entirely in Bengali</span>
                        </li>
                        <li class="flex items-start gap-3 group transition-all duration-300 hover:translate-x-1">
                            <span
                                class="text-white bg-gradient-to-r from-brand-orange to-brand-red rounded-full w-6 h-6 flex items-center justify-center flex-shrink-0 shadow-sm group-hover:shadow-md transition-all duration-300">✓</span>
                            <span class="font-roboto">Learn at your own pace</span>
                        </li>
                    </ul>

                    <button
                        class="mt-8 bg-gradient-to-r from-brand-orange to-brand-red text-white font-roboto font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transform transition-all duration-300 hover:-translate-y-1 hover:scale-105 relative overflow-hidden group">
                        <a href="{{ route('purchase.form', ['type' => 'course', 'id' => $learning->id]) }}">
                            <span class="relative z-10">Enroll Now</span>
                        </a>

                        <span
                            class="absolute top-0 left-0 w-full h-full bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></span>
                    </button>
                </div>

                <!-- Right Content -->
                <div class="flex flex-col items-center text-center md:text-left">
                    @if (!empty($learning->certificate_file) && file_exists(public_path('uploads/' . $learning->certificate_file)))
                        <!-- Small Preview -->
                        <div class="cursor-pointer mb-6" onclick="openCertificateModal()">
                            <canvas id="pdfPreview-{{ $learning->id }}" width="560" height="396"
                                class="rounded-lg shadow-md"></canvas>
                        </div>
                    @else
                        <!-- Fallback if no PDF -->
                        <div
                            class="w-[560px] h-[396px] flex items-center justify-center 
                bg-gray-100 rounded-lg shadow-md border border-dashed border-gray-400">
                            <span class="text-gray-500 text-sm">No Certificate Available</span>
                        </div>
                    @endif
                    <!-- Full Screen Modal -->
                    <div id="certificateModal"
                        class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
                        <div class="relative w-11/12 h-5/6 bg-white rounded-lg overflow-hidden">
                            <button onclick="closeCertificateModal()"
                                class="absolute top-2 right-2 text-white bg-red-500 px-3 py-1 rounded">
                                ✕
                            </button>
                            <iframe id="pdfFull-{{ $learning->id }}" src="" class="w-full h-full"></iframe>
                        </div>
                    </div>

                    {{-- <div
                        class="absolute inset-0 bg-gradient-to-t from-brand-dark/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                        <span class="text-white font-medium px-4 py-2 rounded-full bg-brand-orange/80 text-sm">Preview
                            Certificate</span>
                    </div> --}}

                    <p class="text-gray-700 text-sm sm:text-base font-roboto mb-6">
                        Showcase Your Certificate on LinkedIn, Twitter, Instagram, and
                        Mention Astro Arun Pandit. Additionally, you can feature it in
                        your LinkedIn Certifications section, or include it on printed
                        resumes, CVs, and other professional documents.
                    </p>
                </div>
            </div>
        </section>

        <section class="py-12 sm:py-16 bg-gray-50 px-4 sm:px-6" id="faqs">
            <div class="container mx-auto max-w-5xl">
                <p class="text-sm sm:text-base text-brand-orange font-medium mb-2 text-center">
                    Got Questions?
                </p>
                <h2
                    class="text-2xl md:text-3xl lg:text-4xl font-playfair text-brand-dark mb-10 text-center relative inline-block mx-auto">
                    Frequently Asked Questions
                    <span
                        class="absolute bottom-[-4px] left-0 w-full h-1 bg-gradient-to-r from-brand-orange to-brand-red"></span>
                </h2>

                <div class="space-y-4 sm:space-y-6">
                    @foreach ($faqs as $faq)
                        <div
                            class="my-faq-item bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <button type="button"
                                class="my-faq-question w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none"
                                aria-expanded="false">
                                <span class="font-medium text-brand-dark text-sm sm:text-base font-roboto">
                                    {{ $faq->title }}
                                </span>
                                <span class="my-faq-arrow text-brand-orange transition-transform duration-300"
                                    aria-hidden="true">&#9650;</span>
                            </button>

                            <!-- answer: start collapsed via inline style -->
                            <div class="my-faq-answer px-4 sm:px-6 pb-4 sm:pb-6 pt-0 text-gray-700 text-sm sm:text-base font-roboto"
                                style="max-height: 0; overflow: hidden; transition: max-height 0.35s ease;">
                                <p class="px-4 sm:px-6 pb-4 sm:pb-6 pt-4">
                                    {!! $faq->description !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="text-center mt-8 text-brand-dark font-roboto">
                    Have questions?
                    <a href="#"
                        class="text-brand-orange hover:text-brand-red transition-colors duration-300 font-medium">Talk to
                        our Support Team</a>
                </p>
            </div>
        </section>
    </main>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const headers = document.querySelectorAll(".accordion-header");

        headers.forEach(header => {
            header.addEventListener("click", () => {
                const content = header.nextElementSibling;
                const icon = header.querySelector(".accordion-icon");

                // Close all other accordions (optional, if you want only one open at a time)
                document.querySelectorAll(".accordion-content").forEach(c => {
                    if (c !== content) {
                        c.classList.add("hidden");
                        c.previousElementSibling.querySelector(".accordion-icon")
                            .textContent = "➕";
                    }
                });

                // Toggle the clicked accordion
                content.classList.toggle("hidden");
                icon.textContent = content.classList.contains("hidden") ? "➕" : "➖";
            });
        });
    });
</script>
<!-- Load PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var pdfUrl = "{{ asset('uploads/' . $learning->certificate_file) }}";

        // Render small preview
        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
            pdf.getPage(1).then(function(page) {
                var canvas = document.getElementById("pdfPreview-{{ $learning->id }}");
                var ctx = canvas.getContext("2d");

                var canvasWidth = 560;
                var canvasHeight = 396;
                var viewport = page.getViewport({
                    scale: 1
                });

                var scaleX = canvasWidth / viewport.width;
                var scaleY = canvasHeight / viewport.height;
                var scale = Math.max(scaleX, scaleY); // cover mode
                var scaledViewport = page.getViewport({
                    scale: scale
                });

                var offsetX = (canvasWidth - scaledViewport.width) / 2;
                var offsetY = (canvasHeight - scaledViewport.height) / 2;

                ctx.clearRect(0, 0, canvasWidth, canvasHeight);

                page.render({
                    canvasContext: ctx,
                    viewport: scaledViewport,
                    transform: [1, 0, 0, 1, offsetX, offsetY]
                });
            });
        });

        // Modal functions
        window.openCertificateModal = function() {
            document.getElementById("certificateModal").classList.remove("hidden");
            document.getElementById("pdfFull-{{ $learning->id }}").src = pdfUrl;
        }

        window.closeCertificateModal = function() {
            document.getElementById("certificateModal").classList.add("hidden");
            document.getElementById("pdfFull-{{ $learning->id }}").src = "";
        }
    });
</script>
<!-- OPTIONAL: small fallback CSS (won't break Tailwind) -->
<style>
    /* fallback rotate if Tailwind rotate class missing */
    .my-faq-arrow.rotate-180 {
        transform: rotate(180deg);
    }

    .my-faq-arrow {
        display: inline-block;
    }

    /* ensure transform origin works */
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.my-faq-item');

        items.forEach(item => {
            const btn = item.querySelector('.my-faq-question');
            const answer = item.querySelector('.my-faq-answer');
            const arrow = btn.querySelector('.my-faq-arrow');

            // ensure starting collapsed
            answer.style.maxHeight = '0px';
            btn.setAttribute('aria-expanded', 'false');

            btn.addEventListener('click', function() {
                const isOpen = btn.getAttribute('aria-expanded') === 'true';

                if (isOpen) {
                    // currently open -> collapse
                    // If maxHeight was 'none', set it to its scrollHeight first so transition works
                    if (answer.style.maxHeight === 'none') {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        // force reflow so the next line animates
                        answer.offsetHeight;
                    }
                    answer.style.maxHeight = '0px';
                    btn.setAttribute('aria-expanded', 'false');
                    arrow.classList.remove('rotate-180');
                } else {
                    // open this item
                    // set to scrollHeight to animate
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    btn.setAttribute('aria-expanded', 'true');
                    arrow.classList.add('rotate-180');

                    // after animation completes, remove fixed max-height so content can reflow (images/responsive)
                    const onTransitionEnd = function() {
                        if (btn.getAttribute('aria-expanded') === 'true') {
                            answer.style.maxHeight = 'none';
                        }
                        answer.removeEventListener('transitionend', onTransitionEnd);
                    };
                    answer.addEventListener('transitionend', onTransitionEnd);
                }
            });
        });
    });
</script>

<script>
    function showEnrollPopup() {
        document.getElementById('enrollPopup').classList.remove('hidden');
    }

    function closeEnrollPopup() {
        document.getElementById('enrollPopup').classList.add('hidden');
    }
</script>
