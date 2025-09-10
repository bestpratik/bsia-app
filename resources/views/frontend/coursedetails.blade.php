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
                     <li>
                         <div class="flex items-center">
                             <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                             <a href="{{ route('courses') }}"
                                 class="text-sm font-medium text-gray-700 hover:text-brand-red">
                                 Courses
                             </a>
                         </div>
                     </li>
                     <li aria-current="page">
                         <div class="flex items-center">
                             <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                             <span class="text-sm font-medium text-brand-red">{{ $course->title }}</span>
                         </div>
                     </li>
                 </ol>
             </nav>
         </div>
     </div>

     <!-- Course Details Content -->
     <main class="py-8 md:py-12 bg-gray-50">
         <div class="container mx-auto px-4 max-w-7xl">
             <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                 <!-- Main Content (2/3 width on desktop) -->
                 <div class="lg:col-span-2">
                     <!-- Course Header -->
                     <div
                         class="bg-white rounded-xl shadow-md overflow-hidden mb-8 wow animate__animated animate__fadeInUp">
                         <div class="relative">
                             <img src="{{ asset('uploads/' . $course->featured_image) }}"
                                 alt="Advance Numerology Mentorship Program" class="w-full h-64 md:h-80 object-cover"
                                 loading="lazy" decoding="async" />
                             <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                                 <div class="p-6 md:p-8">
                                     <span
                                         class="inline-block bg-brand-orange px-3 py-1 rounded-full text-white text-xs font-medium mb-3">
                                         Mentorship Program
                                     </span>
                                     <h1 class="text-white font-playfair font-bold text-2xl md:text-3xl lg:text-4xl mb-2">
                                         {{ $course->title }}
                                     </h1>
                                     <div class="flex flex-wrap items-center text-white/90 text-sm gap-4 mt-2">
                                         <div class="flex items-center">
                                             <i class="fas fa-user-tie mr-2"></i>
                                             <span>By: Sujit Pathak</span>
                                         </div>
                                         <div class="flex items-center">
                                             <i class="fas fa-clock mr-2"></i>
                                             <span>Beginner Friendly</span>
                                         </div>
                                         <div class="flex items-center">
                                             <i class="fas fa-language mr-2"></i>
                                             <span>Bengali Medium</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Course Description -->
                     <div class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0.1s">
                         <h2 class="font-playfair font-bold text-xl md:text-2xl text-brand-dark mb-4">
                             About This Course
                         </h2>
                         <p class="text-gray-700">
                             {!! $course->about_course !!}
                         </p>
                         {{-- <p class="text-gray-700">
                         Bengali Medium: Simple, conversational explanations.
                     </p>
                     <p class="text-gray-700">
                         Decode Your Life: Understand planets, signs, houses, and their
                         meanings.
                     </p>
                     <p class="text-gray-700">
                         Chart Reading Basics: Start analyzing charts confidently.
                     </p>
                     <p class="text-gray-700">
                         High Paying Skill: Unlock career opportunities in astrology.
                     </p> --}}
                     </div>

                     <!-- What You'll Learn -->
                     <div class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8 wow animate_animated animate_fadeInUp"
                         data-wow-delay="0.2s">
                         <h2 class="font-playfair font-bold text-xl md:text-2xl text-brand-dark mb-6">
                             What You'll Learn
                         </h2>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                             <div class="flex items-start">
                                 <div
                                     class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                     <i class="fas fa-check text-brand-red"></i>
                                 </div>
                                 <p class="text-gray-700"> {!! $course->why_join_the_course !!} </p>
                             </div>

                             {{-- <div class="flex items-start">
                             <div
                                 class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                 <i class="fas fa-check text-brand-red"></i>
                             </div>
                             <p class="text-gray-700">
                                 Interpret complex numerology charts
                             </p>
                         </div>
                         <div class="flex items-start">
                             <div
                                 class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                 <i class="fas fa-check text-brand-red"></i>
                             </div>
                             <p class="text-gray-700">
                                 Understand karmic debt numbers and their impact
                             </p>
                         </div>
                         <div class="flex items-start">
                             <div
                                 class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                 <i class="fas fa-check text-brand-red"></i>
                             </div>
                             <p class="text-gray-700">
                                 Apply numerology to business and career decisions
                             </p>
                         </div>
                         <div class="flex items-start">
                             <div
                                 class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                 <i class="fas fa-check text-brand-red"></i>
                             </div>
                             <p class="text-gray-700">
                                 Analyze compatibility using numerological principles
                             </p>
                         </div>
                         <div class="flex items-start">
                             <div
                                 class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                 <i class="fas fa-check text-brand-red"></i>
                             </div>
                             <p class="text-gray-700">
                                 Predict future trends using numerological forecasting
                             </p>
                         </div>
                         <div class="flex items-start">
                             <div
                                 class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                 <i class="fas fa-check text-brand-red"></i>
                             </div>
                             <p class="text-gray-700">
                                 Integrate numerology with other spiritual practices
                             </p>
                         </div>
                         <div class="flex items-start">
                             <div
                                 class="flex-shrink-0 w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                 <i class="fas fa-check text-brand-red"></i>
                             </div>
                             <p class="text-gray-700">
                                 Build a successful numerology consultation practice
                             </p>
                         </div> --}}
                         </div>
                     </div>

                     <!-- Course Curriculum -->
                     <div class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0.3s">
                         <h2 class="font-playfair font-bold text-xl md:text-2xl text-brand-dark mb-6">
                             Course Curriculum
                         </h2>

                         <!-- Module 1 -->
                         @foreach ($modules as $module)
                             <div class="border border-gray-200 rounded-lg mb-4 overflow-hidden">
                                 <!-- Accordion Header -->
                                 <div
                                     class="accordion-header bg-gray-50 p-4 flex justify-between items-center cursor-pointer">
                                     <div class="flex items-center">
                                         <div
                                             class="w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                             <i class="fas fa-book text-brand-red"></i>
                                         </div>
                                         <h3 class="font-medium text-brand-dark">
                                             Module {{ $loop->iteration }}: {{ $module->name }}
                                         </h3>
                                     </div>
                                     <i class="fas fa-chevron-down text-gray-400 accordion-icon"></i>
                                 </div>

                                 <!-- Accordion Content (hidden by default) -->
                                 <div class="accordion-content hidden p-4 border-t border-gray-200">
                                     <ul class="space-y-3">
                                         @foreach ($module->lessons as $lesson)
                                             <li class="flex items-center text-gray-700">
                                                 <i class="fas fa-play-circle text-brand-orange mr-3"></i>
                                                 <span>{{ $lesson->title }}</span>
                                                 <span class="ml-auto text-gray-500 text-sm">{{ $lesson->order_no }}
                                                     min</span>
                                             </li>
                                         @endforeach

                                         <li class="flex items-center text-gray-700">
                                             <i class="fas fa-file-alt text-brand-blue mr-3"></i>
                                             <span>{!! $lesson->content !!}</span>
                                             <span class="ml-auto text-gray-500 text-sm">Reading</span>
                                         </li>

                                         @foreach ($module->quizzes as $quiz)
                                             <li class="flex items-center text-gray-700">
                                                 <i class="fas fa-tasks text-brand-purple mr-3"></i>
                                                 <span>{{ $quiz->question }}</span>
                                                 <span class="ml-auto text-gray-500 text-sm">Quiz</span>
                                             </li>
                                         @endforeach
                                     </ul>
                                 </div>
                             </div>
                         @endforeach

                         {{-- <!-- Module 2 -->
                         <div class="border border-gray-200 rounded-lg mb-4 overflow-hidden">
                             <div class="bg-gray-50 p-4 flex justify-between items-center cursor-pointer">
                                 <div class="flex items-center">
                                     <div
                                         class="w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                         <i class="fas fa-book text-brand-red"></i>
                                     </div>
                                     <h3 class="font-medium text-brand-dark">
                                         Module 2: Planets, Houses & Their Meanings
                                     </h3>
                                 </div>
                                 <i class="fas fa-chevron-down text-gray-400"></i>
                             </div>
                             <div class="p-4 border-t border-gray-200">
                                 <ul class="space-y-3">
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-play-circle text-brand-orange mr-3"></i>
                                         <span>Grahas (Planets) & Their Effects</span>
                                         <span class="ml-auto text-gray-500 text-sm">50 min</span>
                                     </li>
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-play-circle text-brand-orange mr-3"></i>
                                         <span>12 Houses & Life Areas</span>
                                         <span class="ml-auto text-gray-500 text-sm">45 min</span>
                                     </li>
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-file-alt text-brand-blue mr-3"></i>
                                         <span>Planetary Symbols PDF</span>
                                         <span class="ml-auto text-gray-500 text-sm">Reading</span>
                                     </li>
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-tasks text-brand-purple mr-3"></i>
                                         <span>Module 2 Quiz</span>
                                         <span class="ml-auto text-gray-500 text-sm">Quiz</span>
                                     </li>
                                 </ul>
                             </div>
                         </div>

                         <!-- Module 3 -->
                         <div class="border border-gray-200 rounded-lg overflow-hidden">
                             <div class="bg-gray-50 p-4 flex justify-between items-center cursor-pointer">
                                 <div class="flex items-center">
                                     <div
                                         class="w-8 h-8 bg-brand-red/10 rounded-full flex items-center justify-center mr-3">
                                         <i class="fas fa-book text-brand-red"></i>
                                     </div>
                                     <h3 class="font-medium text-brand-dark">
                                         Module 3: Chart Reading & Predictions
                                     </h3>
                                 </div>
                                 <i class="fas fa-chevron-down text-gray-400"></i>
                             </div>
                             <div class="p-4 border-t border-gray-200">
                                 <ul class="space-y-3">
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-play-circle text-brand-orange mr-3"></i>
                                         <span>Step-by-Step Birth Chart Analysis</span>
                                         <span class="ml-auto text-gray-500 text-sm">60 min</span>
                                     </li>
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-play-circle text-brand-orange mr-3"></i>
                                         <span>Making Basic Predictions</span>
                                         <span class="ml-auto text-gray-500 text-sm">55 min</span>
                                     </li>
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-file-alt text-brand-blue mr-3"></i>
                                         <span>Sample Case Studies</span>
                                         <span class="ml-auto text-gray-500 text-sm">Reading</span>
                                     </li>
                                     <li class="flex items-center text-gray-700">
                                         <i class="fas fa-tasks text-brand-purple mr-3"></i>
                                         <span>Module 3 Quiz</span>
                                         <span class="ml-auto text-gray-500 text-sm">Quiz</span>
                                     </li>
                                 </ul>
                             </div>
                         </div> --}}

                         <p class="text-gray-500 text-sm mt-4">
                             <i class="fas fa-info-circle mr-1"></i>
                             This is a preview of the curriculum. The full course contains 12
                             modules with over 60 hours of content.
                         </p>
                     </div>

                     <!-- Instructor -->
                     <div class="bg-white rounded-xl shadow-md p-6 md:p-8 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0.4s">
                         <h2 class="font-playfair font-bold text-xl md:text-2xl text-brand-dark mb-6">
                             Your Instructor
                         </h2>
                         <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                             <img src="https://astrosoumalyapathak.com/uploads/banner/1735046378.png" alt="Arun Pandit"
                                 class="w-24 h-24 rounded-full object-cover" loading="lazy" decoding="async" />
                             <div>
                                 <h3 class="font-bold text-lg text-brand-dark mb-2">
                                     {{ $course->instructor_name }}
                                 </h3>
                                 <p class="text-brand-orange font-medium mb-3">
                                     {{ $course->instructor_designation }}
                                 </p>
                                 <p class="text-gray-700 mb-4">
                                     {!! $course->instructor_details !!}
                                 </p>

                                 <div class="flex space-x-3">
                                     <a href="#" class="text-gray-400 hover:text-brand-red transition-colors">
                                         <i class="fab fa-facebook-f"></i>
                                     </a>
                                     <a href="#" class="text-gray-400 hover:text-brand-red transition-colors">
                                         <i class="fab fa-instagram"></i>
                                     </a>
                                     <a href="#" class="text-gray-400 hover:text-brand-red transition-colors">
                                         <i class="fab fa-youtube"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Sidebar (1/3 width on desktop) -->
                 <div class="lg:col-span-1">
                     <!-- Course Info Card -->
                     <div
                         class="bg-white rounded-xl shadow-md overflow-hidden sticky top-24 wow animate__animated animate__fadeInUp">
                         <!-- Price Section -->
                         <div class="p-6 border-b border-gray-100">
                             <div class="flex items-center justify-between mb-4">
                                 <span class="text-3xl font-bold text-brand-dark">₹24,500</span>
                                 <span class="line-through text-gray-400">₹32,000</span>
                             </div>
                             <div class="space-y-3">
                                 <a href="{{ route('course.learning', $course->slug) }}">
                                     <button
                                         class="w-full py-3 px-6 bg-gradient-to-r from-brand-red to-red-700 text-white rounded-lg hover:from-red-700 hover:to-brand-red transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                                         <i class="fas fa-shopping-cart mr-2"></i>
                                         Enroll Now
                                     </button>
                                 </a>

                                 <button
                                     class="w-full py-3 px-6 border-2 border-brand-red text-brand-red rounded-lg hover:bg-brand-red hover:text-white transition-all duration-300 font-medium transform hover:scale-105">
                                     <i class="far fa-heart mr-2"></i>
                                     Add to Wishlist
                                 </button>
                             </div>
                         </div>

                         <!-- Course Features -->
                         <div class="p-6">
                             <h3 class="font-bold text-lg text-brand-dark mb-4">
                                 This Course Includes:
                             </h3>
                             <ul class="space-y-3">
                                 <li class="flex items-center text-gray-700">
                                     <i class="fas fa-video text-brand-orange mr-3"></i>
                                     <span>60+ hours of video content</span>
                                 </li>
                                 <li class="flex items-center text-gray-700">
                                     <i class="fas fa-file-alt text-brand-blue mr-3"></i>
                                     <span>25 downloadable resources</span>
                                 </li>
                                 <li class="flex items-center text-gray-700">
                                     <i class="fas fa-infinity text-brand-purple mr-3"></i>
                                     <span>Lifetime access</span>
                                 </li>
                                 <li class="flex items-center text-gray-700">
                                     <i class="fas fa-mobile-alt text-brand-red mr-3"></i>
                                     <span>Access on mobile and TV</span>
                                 </li>
                                 <li class="flex items-center text-gray-700">
                                     <i class="fas fa-certificate text-brand-gold mr-3"></i>
                                     <span>Certificate of completion</span>
                                 </li>
                                 <li class="flex items-center text-gray-700">
                                     <i class="fas fa-users text-green-500 mr-3"></i>
                                     <span>Live Q&A sessions</span>
                                 </li>
                                 <li class="flex items-center text-gray-700">
                                     <i class="fas fa-comments text-blue-500 mr-3"></i>
                                     <span>1-on-1 mentorship</span>
                                 </li>
                             </ul>
                         </div>

                         <!-- Share Section -->
                         <div class="p-6 border-t border-gray-100">
                             <h3 class="font-bold text-lg text-brand-dark mb-4">
                                 Share This Course:
                             </h3>
                             <div class="flex space-x-3">
                                 <a href="#"
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
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Related Courses -->
             <div class="mt-12 md:mt-16 wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                 <h2 class="font-playfair font-bold text-2xl md:text-3xl text-brand-dark mb-8">
                     Related Courses
                 </h2>
                 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                     <!-- Course 1 -->
                     @foreach ($relatedCourses as $related)
                         <div>
                             <a href="{{ route('course.details', $related->slug) }}">
                                 <div
                                     class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                     <img src="{{ asset('uploads/' . $related->featured_image) }}"
                                         alt="{{ $related->title }}" class="w-full h-48 object-cover" loading="lazy"
                                         decoding="async" />
                                     <div class="p-5">
                                         <h3 class="font-roboto font-bold text-lg text-brand-dark mb-2">
                                             {{ $related->title }}
                                         </h3>
                                         <p class="text-gray-600 text-sm mb-4">
                                             {!! Str::limit($related->short_description, 100) !!}</p>
                                         <div class="flex justify-between items-center">
                                             <span
                                                 class="text-brand-red font-bold">₹{{ number_format($related->sellable_price) }}</span>
                                             <a href="{{ route('course.details', $related->slug) }}"
                                                 class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-brand-dark transition-colors text-sm font-medium">Enroll</a>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     @endforeach


                     {{-- <!-- Course 2 -->
                 <div>
                     <a href="{{ route('course.details') }}">
                         <div
                             class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                             <img src="{{ asset('photo/c3.jpg') }}" alt="The Ultimate Astrology Course"
                                 class="w-full h-48 object-cover" loading="lazy" decoding="async" />
                             <div class="p-5">
                                 <h3 class="font-roboto font-bold text-lg text-brand-dark mb-2">
                                     The Ultimate Astrology Course
                                 </h3>
                                 <p class="text-gray-600 text-sm mb-4">
                                     Looking to advance your knowledge in the field of
                                     Astrology, our advance level mentorship course is the
                                     ideal choice for you.
                                 </p>
                                 <div class="flex justify-between items-center">
                                     <span class="text-brand-red font-bold">₹18,500</span>
                                     <a href="#"
                                         class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-brand-dark transition-colors text-sm font-medium">Enroll</a>
                                 </div>
                             </div>
                         </div>
                     </a>
                 </div>

                 <!-- Course 3 -->
                 <div>
                     <a href="{{ route('course.details') }}">
                         <div
                             class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                             <img src="{{ asset('photo/c4.png') }}" alt="Palmistry Fundamentals"
                                 class="w-full h-48 object-cover" loading="lazy" decoding="async" />
                             <div class="p-5">
                                 <h3 class="font-roboto font-bold text-lg text-brand-dark mb-2">
                                     Palmistry Fundamentals
                                 </h3>
                                 <p class="text-gray-600 text-sm mb-4">
                                     Discover the ancient art of palm reading with our
                                     comprehensive course on palmistry fundamentals.
                                 </p>
                                 <div class="flex justify-between items-center">
                                     <span class="text-brand-red font-bold">₹1,499</span>
                                     <a href="#"
                                         class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-brand-dark transition-colors text-sm font-medium">Enroll</a>
                                 </div>
                             </div>
                         </div>
                     </a>
                 </div> --}}
                 </div>
             </div>
         </div>
     </main>
 @endsection
 <script>
     document.addEventListener("DOMContentLoaded", () => {
         const headers = document.querySelectorAll(".accordion-header");

         headers.forEach(header => {
             const content = header.nextElementSibling;
             const icon = header.querySelector(".accordion-icon");

             // 🔹 Open all accordions on page load
             content.classList.remove("hidden");
             icon.classList.replace("fa-chevron-down", "fa-chevron-up");

             // 🔹 Toggle functionality
             header.addEventListener("click", () => {
                 content.classList.toggle("hidden");
                 if (icon.classList.contains("fa-chevron-down")) {
                     icon.classList.replace("fa-chevron-down", "fa-chevron-up");
                 } else {
                     icon.classList.replace("fa-chevron-up", "fa-chevron-down");
                 }
             });
         });
     });
 </script>
