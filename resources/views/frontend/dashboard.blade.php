@extends('frontend.layout.front-layout')
@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3 border-b border-gray-200">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-brand-red">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-brand-red">Dashboard</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Dashboard Content -->
    <main class="py-8 md:py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Welcome Section -->
            <div class="mb-8 md:mb-12">
                <h1
                    class="font-playfair font-bold text-2xl md:text-3xl lg:text-4xl text-brand-dark mb-4 wow animate__animated animate__fadeInUp">
                    @auth
                        <p>{{ Auth::user()->name }}!</p>
                    @endauth
                </h1>
                <p class="font-roboto text-gray-600 max-w-3xl wow animate__animated animate__fadeInUp"
                    data-wow-delay="0.2s">
                    Welcome to your personal dashboard. Track your progress, access your
                    courses, and manage your learning journey.
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-12">
                <!-- Courses Card -->
                <div class="bg-white rounded-xl shadow-md p-4 md:p-6 border border-gray-100 wow animate__animated animate__fadeInUp"
                    data-wow-delay="0.1s">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-brand-red/10 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-graduation-cap text-brand-red text-xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-brand-dark mb-1">2</h2>
                        <p class="text-gray-500 text-sm">Courses</p>
                    </div>
                </div>

                <!-- Hours Card -->
                <div class="bg-white rounded-xl shadow-md p-4 md:p-6 border border-gray-100 wow animate__animated animate__fadeInUp"
                    data-wow-delay="0.2s">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-brand-orange/10 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-clock text-brand-orange text-xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-brand-dark mb-1">11</h2>
                        <p class="text-gray-500 text-sm">Hours</p>
                    </div>
                </div>

                <!-- Posts Card -->
                <div class="bg-white rounded-xl shadow-md p-4 md:p-6 border border-gray-100 wow animate__animated animate__fadeInUp"
                    data-wow-delay="0.3s">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-brand-purple/10 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-file-alt text-brand-purple text-xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-brand-dark mb-1">0</h2>
                        <p class="text-gray-500 text-sm">Posts</p>
                    </div>
                </div>

                <!-- Certificates Card -->
                <div class="bg-white rounded-xl shadow-md p-4 md:p-6 border border-gray-100 wow animate__animated animate__fadeInUp"
                    data-wow-delay="0.4s">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-brand-blue/10 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-certificate text-brand-blue text-xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-brand-dark mb-1">1</h2>
                        <p class="text-gray-500 text-sm">Certificates</p>
                    </div>
                </div>
            </div>

            <!-- My Courses Section -->
            <div class="mb-12">
                <div class="flex justify-between items-center mb-6">
                    <h2
                        class="font-playfair font-bold text-xl md:text-2xl lg:text-3xl text-brand-dark wow animate__animated animate__fadeInUp">
                        Our Courses
                    </h2>
                    <a href="{{ route('courses') }}"
                        class="text-brand-red hover:text-brand-dark transition-colors font-medium text-sm wow animate__animated animate__fadeInUp">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Courses Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Course 1 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0.1s">
                        <img src="{{ asset('photo/c1.jpg') }}" alt="Infinite Astrology" class="w-full h-48 object-cover"
                            loading="lazy" decoding="async" />
                        <div class="p-5">
                            <h3 class="font-roboto font-bold text-lg text-brand-dark mb-2">
                                Infinite Astrology
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                A beginner-friendly Vedic astrology course in Bengali,
                                teaching you how to read charts, decode planets, and
                                understand cosmic influences from Day 1 — no prior knowledge
                                required.
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-brand-red font-bold">₹12,000</span>
                                <a href="coursedetails-infinite-astrology.html"
                                    class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-brand-dark transition-colors text-sm font-medium">Enroll</a>
                            </div>
                        </div>
                    </div>

                    <!-- Course 2 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0.2s">
                        <img src="{{ asset('photo/c2.jpg') }}" alt="Advance Numerology Mentorship Program"
                            class="w-full h-48 object-cover" loading="lazy" decoding="async" />
                        <div class="p-5">
                            <h3 class="font-roboto font-bold text-lg text-brand-dark mb-2">
                                Advance Numerology Mentorship Program
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                Embark on an enlightening journey into the depths of
                                Numerology with the guidance of renowned Numerologist Arun
                                Pandit.
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-brand-red font-bold">₹24,500</span>
                                {{-- <a href="{{ route('course.details') }}"
                                    class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-brand-dark transition-colors text-sm font-medium">Enroll</a> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Course 3 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0.3s">
                        <img src="{{ asset('photo/c3.jpg') }}" alt="The Ultimate Astrology Course"
                            class="w-full h-48 object-cover" loading="lazy" decoding="async" />
                        <div class="p-5">
                            <h3 class="font-roboto font-bold text-lg text-brand-dark mb-2">
                                The Ultimate Astrology Course
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                Looking to advance your knowledge in the field of Astrology,
                                our advance level mentorship course is the ideal choice for
                                you.
                            </p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <span class="text-brand-red font-bold mr-2">100% Complete</span>
                                    <i class="fas fa-check-circle text-green-500"></i>
                                </div>
                                {{-- <a href="{{ route('course.details') }}"
                                    class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors text-sm font-medium">Start
                                    Learning</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="mb-12">
                <h2
                    class="font-playfair font-bold text-xl md:text-2xl lg:text-3xl text-brand-dark mb-6 wow animate__animated animate__fadeInUp">
                    Recent Activity
                </h2>

                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 wow animate__animated animate__fadeInUp"
                    data-wow-delay="0.1s">
                    <div class="space-y-6">
                        <!-- Activity 1 -->
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-brand-red/10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-certificate text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-brand-dark">
                                    Certificate Earned
                                </h3>
                                <p class="text-gray-600 text-sm">
                                    You've earned a certificate for completing The Ultimate
                                    Astrology Course
                                </p>
                                <p class="text-gray-400 text-xs mt-1">2 days ago</p>
                            </div>
                        </div>

                        <!-- Activity 2 -->
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-brand-orange/10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-play-circle text-brand-orange"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-brand-dark">Lesson Completed</h3>
                                <p class="text-gray-600 text-sm">
                                    You've completed "Advanced Numerology Techniques" in Advance
                                    Numerology Mentorship Program
                                </p>
                                <p class="text-gray-400 text-xs mt-1">5 days ago</p>
                            </div>
                        </div>

                        <!-- Activity 3 -->
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-brand-purple/10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-graduation-cap text-brand-purple"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-brand-dark">Course Enrolled</h3>
                                <p class="text-gray-600 text-sm">
                                    You've enrolled in Basic Numerology Course
                                </p>
                                <p class="text-gray-400 text-xs mt-1">1 week ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Section -->
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h2
                        class="font-playfair font-bold text-xl md:text-2xl lg:text-3xl text-brand-dark wow animate__animated animate__fadeInUp">
                        Messages
                    </h2>
                    <span
                        class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-sm wow animate__animated animate__fadeInUp">0
                        Messages</span>
                </div>

                <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100 text-center wow animate__animated animate__fadeInUp"
                    data-wow-delay="0.1s">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="font-medium text-brand-dark mb-2">No Messages Yet</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        You don't have any messages in your inbox right now.
                    </p>
                    <button
                        class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-brand-dark transition-colors text-sm font-medium">
                        <i class="fas fa-paper-plane mr-2"></i> Contact Support
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
