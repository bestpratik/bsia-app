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
                    <li class="flex-shrink-0">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <a href="{{ route('course.details', $learning->slug) }}"
                                class="text-sm font-medium text-gray-700 hover:text-brand-red whitespace-nowrap">
                                <span class="hidden xs:inline">Infinite Astrology</span>
                                <span class="xs:hidden">Astrology</span>
                            </a>
                        </div>
                    </li>
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
                    <video class="w-full rounded-2xl shadow-xl border-4 border-white/10" controls>
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Text -->
                <div class="text-white md:pl-8 text-center md:text-left">
                    <h1 class="text-3xl md:text-5xl font-playfair font-bold leading-tight mb-6">
                        Infinite Astrology <br />
                        Course
                    </h1>
                    <a href="#enroll"
                        class="inline-block bg-gradient-to-r from-brand-orange to-brand-gold text-white hover:from-brand-gold hover:to-brand-orange font-roboto font-medium px-8 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        Enroll Now
                    </a>
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
                        Infinite Astrology is a beginner-friendly course that opens the
                        doorway to the mysterious world of Vedic astrology. Designed
                        entirely in Bengali, this program makes complex astrological ideas
                        accessible to everyone, regardless of age or educational
                        background. It lays the perfect foundation for decoding your birth
                        chart, understanding planetary influences, and grasping how cosmic
                        energies affect your life.
                    </p>
                    <p class="mb-4 text-gray-700 font-roboto leading-relaxed text-sm sm:text-base">
                        Whether you're a curious learner, a spiritual seeker, or someone
                        who wants to start a new journey in astrology — this course will
                        equip you with the essential knowledge to read and interpret
                        horoscopes, make simple predictions, and discover the unseen
                        forces shaping your reality. With a practical learning approach,
                        interactive examples, and real-life references, you’ll find
                        yourself truly connected to the stars.
                    </p>

                    <!-- Why Join -->
                    <h3 class="mt-8 mb-4 text-xl sm:text-2xl font-playfair font-bold text-brand-dark">
                        Why should you join this course?
                    </h3>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                        <div
                            class="bg-brand-dark text-white p-4 sm:p-5 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <h4 class="font-roboto font-medium mb-2 text-base sm:text-lg">
                                Learn from Scratch
                            </h4>
                            <p class="text-sm text-white/90 font-roboto">
                                No prior astrology knowledge required — perfect for total
                                beginners.
                            </p>
                        </div>
                        <div
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
                        </div>
                    </div>
                </div>

                <!-- Right Column (Course Details) -->
                <div
                    class="bg-white p-6 rounded-xl shadow-md border border-gray-100 space-y-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start">
                        <div
                            class="bg-brand-orange/10 p-3 rounded-full mr-4 transition-all duration-300 hover:bg-brand-orange/20 flex items-center justify-center w-12 h-12">
                            <i class="fas fa-calendar-alt text-brand-orange text-xl"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-roboto font-medium text-brand-dark text-base sm:text-lg leading-tight">
                                RECORDED COURSE
                            </h4>
                            <p class="text-sm text-gray-600 font-roboto mt-1">
                                Watch anytime anywhere with ease
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="bg-brand-gold/10 p-3 rounded-full mr-4 transition-all duration-300 hover:bg-brand-gold/20 flex items-center justify-center w-12 h-12">
                            <i class="fas fa-certificate text-brand-gold text-xl"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-roboto font-medium text-brand-dark text-base sm:text-lg leading-tight">
                                CERTIFICATE
                            </h4>
                            <p class="text-sm text-gray-600 font-roboto mt-1">
                                Get certificate upon completion
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="bg-brand-red/10 p-3 rounded-full mr-4 transition-all duration-300 hover:bg-brand-red/20 flex items-center justify-center w-12 h-12">
                            <i class="fas fa-clock text-brand-red text-xl"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-roboto font-medium text-brand-dark text-base sm:text-lg leading-tight">
                                4 HOURS OF WATCH TIME
                            </h4>
                            <p class="text-sm text-gray-600 font-roboto mt-1">
                                25 modules of theory with practical exercises
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="bg-purple-100 p-3 rounded-full mr-4 transition-all duration-300 hover:bg-purple-200 flex items-center justify-center w-12 h-12">
                            <i class="fas fa-language text-purple-500 text-xl"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-roboto font-medium text-brand-dark text-base sm:text-lg leading-tight">
                                LANGUAGE
                            </h4>
                            <p class="text-sm text-gray-600 font-roboto mt-1">
                                Courses language is Hinglish
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="bg-brand-dark/10 p-3 rounded-full mr-4 transition-all duration-300 hover:bg-brand-dark/20 flex items-center justify-center w-12 h-12">
                            <i class="fas fa-users text-brand-dark text-xl"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-roboto font-medium text-brand-dark text-base sm:text-lg leading-tight">
                                BULK ENROLL
                            </h4>
                            <p class="text-sm text-gray-600 font-roboto mt-1">
                                Enroll in multiple courses with single login
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enroll Button -->
            <div class="mt-10 text-center">
                <a href="#enroll"
                    class="inline-block bg-brand-orange hover:bg-brand-orange/90 text-white font-roboto font-medium px-8 py-3 rounded-full transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-lg">
                    Enroll Now - ₹4999
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
            <div class="border-b border-gray-200 hover:border-brand-orange/30 transition-colors duration-300">
                <button
                    class="w-full flex items-center justify-between py-4 sm:py-5 text-left text-lg font-medium text-brand-dark focus:outline-none accordion-header hover:text-brand-red transition-colors duration-300">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <span
                            class="bg-brand-red text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center text-sm sm:text-base font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">01</span>
                        <span class="font-playfair text-lg sm:text-xl">Introduction to Vedic Astrology</span>
                    </div>
                    <span
                        class="transition-transform duration-300 accordion-icon text-brand-gold text-xl sm:text-2xl">➖</span>
                </button>
                <div class="accordion-content pb-4 pl-4 sm:pl-16">
                    <ul class="space-y-3 text-gray-700">
                        <li
                            class="flex justify-between border-b border-gray-100 pb-3 hover:bg-gray-50 px-2 py-1 rounded-lg">
                            <span class="font-roboto"><i class="fas fa-play-circle text-brand-red mr-2"></i> Course
                                Orientation & Goals</span>
                            <span class="text-gray-500 font-roboto">05:00</span>
                        </li>
                        <li
                            class="flex justify-between border-b border-gray-100 pb-3 hover:bg-gray-50 px-2 py-1 rounded-lg">
                            <span class="font-roboto"><i class="fas fa-play-circle text-brand-red mr-2"></i>
                                Understanding the Zodiac Signs</span>
                            <span class="text-gray-500 font-roboto">12:30</span>
                        </li>
                        <li class="flex justify-between hover:bg-gray-50 px-2 py-1 rounded-lg">
                            <span class="font-roboto"><i class="fas fa-file-alt text-brand-gold mr-2"></i>
                                Downloadable Zodiac Chart PDF</span>
                            <span class="text-gray-500 font-roboto">8 Pages</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Repeat for Module 2 -->
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
            </div>
        </section>

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
                        Sujit Pathak – Vedic Astrologer & Co-Founder, BSIA
                        <span
                            class="absolute bottom-[-4px] left-0 w-full h-1 bg-gradient-to-r from-brand-orange to-brand-red"></span>
                    </h2>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4">
                        Born and raised in a spiritually rooted family in Shyamnagar
                        (North 24 Parganas), Sujit Pathak has over 20 years of experience
                        in astrology, Vastu, palmistry, numerology, and medical astrology.
                        He’s based near Kolkata and serves clients across Barrackpore,
                        Hooghly, Serampore, and beyond.
                    </p>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4">
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
                    </p>
                </div>
            </div>
        </section>

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
                    <div
                        class="bg-white p-6 sm:p-8 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 mx-2 my-4">
                        <div class="mb-4">
                            <i class="fas fa-quote-left text-3xl text-brand-orange/20"></i>
                        </div>
                        <p class="text-gray-700 text-sm sm:text-base mb-6 italic">
                            I completed a basic numerology recorded course with Occult
                            Gurukul, and it was truly amazing. The course was easy to follow
                            and provided a great introduction to numerology. I learned a lot
                            and found the content engaging, inspiring me to explore further
                            studies and apply the knowledge in my everyday life.
                        </p>
                        <div class="flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-brand-orange/20 flex items-center justify-center mr-3">
                                <span class="text-brand-orange font-bold text-xl">MR</span>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-brand-dark">Muskan Raut</p>
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
                    </div>
                </div>
            </div>
        </section>

        <section class="px-4 py-8 max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold text-center text-teal-800 mb-6">
                You Can Also Enroll
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                @foreach($learn as $learning)
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="{{ asset('uploads/' .$learning->featured_image) }}" alt="Course 1" class="w-full h-auto rounded-lg mb-4" />
                    <h3 class="text-lg font-medium text-gray-800 text-center">
                        Lal Kitab E-book
                    </h3>
                    <p class="text-lg font-semibold text-gray-900 mt-2">₹199</p>
                    <button class="mt-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enroll
                    </button>
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
                        <span class="relative z-10">Enroll Now</span>
                        <span
                            class="absolute top-0 left-0 w-full h-full bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></span>
                    </button>
                </div>

                <!-- Right Content -->
                <div class="flex flex-col items-center text-center md:text-left">
                    <div
                        class="relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 mb-4">
                        <img src="https://lwfiles.mycourse.app/64f3160f01ac55bf5644e428-public/bba19f28a87db0f6cd7ee8828a7d406d.png"
                            alt="Certificate" class="max-w-full h-auto rounded-lg" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-brand-dark/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                            <span class="text-white font-medium px-4 py-2 rounded-full bg-brand-orange/80 text-sm">Preview
                                Certificate</span>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm sm:text-base font-roboto">
                        Showcase Your Certificate on LinkedIn, Twitter, Instagram, and
                        Mention Astro Arun Pandit. Additionally, you can feature it in
                        your LinkedIn Certifications section, or include it on printed
                        resumes, CVs, and other professional documents.
                    </p>
                </div>
            </div>
        </section>

        <!-- <section class="faq">
          <h2>Frequently asked questions</h2>

          <div class="faq-grid">
            <div class="faq-item">
              <button class="faq-question text-[16px] font-semibold">
                How do I access the recorded courses?
                <span class="arrow">&#9650;</span>
              </button>
              <div class="faq-answer">
                <p>
                  To access our recorded courses, browse our courses, choose the course you're interested in, and make a
                  purchase.
                  You'll receive access instructions via email.
                </p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-question text-[16px] font-semibold">
                Will I receive a certificate upon course completion?
                <span class="arrow">&#9650;</span>
              </button>
              <div class="faq-answer">
                <p>
                  Yes, you will receive a certificate for course completion once you have finished the course.
                </p>
              </div>
            </div>
          </div>

          <p class="faq-footer">Have questions? <a href="#">Talk to our Support Team</a></p>
        </section> -->

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
                    <!-- FAQ 1 -->
                    @foreach($faqs as $faq)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                        <button
                            class="faq-question w-full text-left p-4 sm:p-6 flex justify-between items-center focus:outline-none">
                            <span class="font-medium text-brand-dark text-base sm:text-lg font-roboto">
                                {{ $faq->title }}
                            </span>
                            <span class="text-brand-orange transition-transform duration-300 transform">&#9650;</span>
                        </button>
                        <div
                            class="faq-answer px-4 sm:px-6 pb-4 sm:pb-6 pt-0 text-gray-700 text-sm sm:text-base font-roboto">
                            <p class="border-t border-gray-100 pt-4">
                                {!! $faq->description !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    {{-- <!-- FAQ 2 -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                        <button
                            class="faq-question w-full text-left p-4 sm:p-6 flex justify-between items-center focus:outline-none">
                            <span class="font-medium text-brand-dark text-base sm:text-lg font-roboto">
                                Will I get a certificate?
                            </span>
                            <span class="text-brand-orange transition-transform duration-300 transform">&#9650;</span>
                        </button>
                        <div
                            class="faq-answer px-4 sm:px-6 pb-4 sm:pb-6 pt-0 text-gray-700 text-sm sm:text-base font-roboto">
                            <p class="border-t border-gray-100 pt-4">
                                Yes, you will receive a digital certificate after completing
                                the course, which you can showcase on social media or your
                                professional portfolio.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                        <button
                            class="faq-question w-full text-left p-4 sm:p-6 flex justify-between items-center focus:outline-none">
                            <span class="font-medium text-brand-dark text-base sm:text-lg font-roboto">
                                Can I watch the course on my mobile?
                            </span>
                            <span class="text-brand-orange transition-transform duration-300 transform">&#9650;</span>
                        </button>
                        <div
                            class="faq-answer px-4 sm:px-6 pb-4 sm:pb-6 pt-0 text-gray-700 text-sm sm:text-base font-roboto">
                            <p class="border-t border-gray-100 pt-4">
                                Absolutely! You can watch it on any device — mobile, tablet,
                                or desktop — anytime you want.
                            </p>
                        </div>
                    </div> --}}
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
