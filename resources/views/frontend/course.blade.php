 @extends('frontend.layout.front-layout')
 @section('content')
     <!-- Breadcrumb -->
     <section class="bg-gray-50 py-6">
         <div class="container mx-auto px-4 max-w-7xl">
             <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
                 <ol class="list-reset flex items-center gap-2">
                     <li><a href="/" class="hover:text-brand-red">Home</a></li>
                     <li><span class="text-gray-400">/</span></li>
                     <li class="text-brand-dark font-medium">Courses</li>
                 </ol>
             </nav>
             <h1 class="mt-2 font-playfair text-3xl md:text-5xl font-bold text-brand-dark">
                 Courses
             </h1>
         </div>
     </section>

     <!-- Toolbar -->
     <section class="py-4">
         <div class="container mx-auto px-4 max-w-7xl flex items-center justify-between">
             <p class="text-gray-600">Explore our curated courses</p>
             <div class="view-toggle flex gap-2" data-target="#courses-page">
                 <button class="active" data-view="grid">
                     <i class="fa-solid fa-border-all mr-2"></i><span class="vt-label">Grid</span>
                 </button>
                 <button data-view="list">
                     <i class="fa-solid fa-list mr-2"></i><span class="vt-label">List</span>
                 </button>
             </div>
         </div>
     </section>

     <!-- Items -->
     <main id="courses-page" class="pb-16">
         <div class="container mx-auto px-4 max-w-7xl">
             <div class="items-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                 <!-- Card 1 -->
                 @foreach ($course as $row)
                     <a href="{{ route('course.learning', $row->slug) }}"
                         class="course-card group bg-white rounded-2xl sm:rounded-3xl border border-gray-200 overflow-hidden hover:shadow-2xl hover:shadow-brand-orange/10 transition-all duration-500 hover:-translate-y-2 h-full">
                         <div class="relative overflow-hidden thumb">
                             <img src="{{ $row->featured_image ? asset('uploads/' . $row->featured_image) : asset('photo/default-banner.jpg') }}"
                                 alt="Infinite Astrology"
                                 class="w-full h-40 sm:h-48 lg:h-56 object-cover group-hover:scale-110 transition-transform duration-500" />
                             <div
                                 class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                             </div>
                             <div
                                 class="absolute top-3 sm:top-4 right-3 sm:right-4 bg-brand-red text-white px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-medium">
                                 Beginner
                             </div>
                             <div
                                 class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-white/90 backdrop-blur-sm text-brand-dark px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-bold">
                                 ⭐ 4.9
                             </div>
                         </div>
                         <div class="p-4 sm:p-6 body">
                             <h3
                                 class="font-roboto font-bold text-lg sm:text-xl lg:text-2xl text-brand-dark mb-2 sm:mb-3 group-hover:text-brand-red transition-colors">
                                 {{ $row->title ?? '' }}
                             </h3>
                             @if ($row->about_course)
                                 <p
                                     class="font-roboto text-xs sm:text-sm lg:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed line-clamp-3">
                                     {!! \Illuminate\Support\Str::limit(strip_tags($row->about_course), 150) ?? '' !!}
                                     <span class="text-blue-400 text-sm cursor-pointer">Read More</span>
                                 </p>
                             @endif

                             <div class="flex items-center justify-between mb-3 sm:mb-4 text-xs sm:text-sm">
                                 <div class="flex items-center text-brand-orange">
                                     <i class="fas fa-clock mr-1 sm:mr-2"></i><span class="font-roboto">12 Weeks</span>
                                 </div>
                                 <div class="flex items-center text-brand-orange">
                                     <i class="fas fa-users mr-1 sm:mr-2"></i><span class="font-roboto">500+ Students</span>
                                 </div>
                                 <div class="flex items-center text-brand-orange">
                                     <i class="fas fa-certificate mr-1 sm:mr-2"></i><span
                                         class="font-roboto">Certified</span>
                                 </div>
                             </div>
                             <button
                                 class="w-full h-10 sm:h-12 lg:h-14 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-brand-orange rounded-xl text-white font-roboto text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 enroll-button">
                                 <i class="fas fa-play mr-2"></i>
                                 Enroll Now
                             </button>
                         </div>
                     </a>
                 @endforeach
                 {{-- <!-- Card 2 -->
                 <a href="{{ route('course.details') }}"
                     class="course-card group bg-white rounded-2xl sm:rounded-3xl border border-gray-200 overflow-hidden hover:shadow-2xl hover:shadow-brand-orange/10 transition-all duration-500 hover:-translate-y-2 h-full">
                     <div class="relative overflow-hidden thumb">
                         <img src="{{ asset('photo/c2.jpg') }}" alt="Ultimate Palmistry"
                             class="w-full h-40 sm:h-48 lg:h-56 object-cover group-hover:scale-110 transition-transform duration-500" />
                         <div
                             class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                         </div>
                         <div
                             class="absolute top-3 sm:top-4 right-3 sm:right-4 bg-brand-red text-white px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-medium">
                             Beginner
                         </div>
                         <div
                             class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-white/90 backdrop-blur-sm text-brand-dark px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-bold">
                             ⭐ 4.8
                         </div>
                     </div>
                     <div class="p-4 sm:p-6 body">
                         <h3
                             class="font-roboto font-bold text-lg sm:text-xl lg:text-2xl text-brand-dark mb-2 sm:mb-3 group-hover:text-brand-red transition-colors">
                             Ultimate Palmistry
                         </h3>
                         <p class="font-roboto text-xs sm:text-sm lg:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed">
                             Discover the cosmic connection between numbers and planets in
                             this foundational palmistry course for absolute beginners.
                         </p>
                         <div class="flex items-center justify-between mb-3 sm:mb-4 text-xs sm:text-sm">
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-clock mr-1 sm:mr-2"></i><span class="font-roboto">10 Weeks</span>
                             </div>
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-users mr-1 sm:mr-2"></i><span class="font-roboto">350+ Students</span>
                             </div>
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-certificate mr-1 sm:mr-2"></i><span class="font-roboto">Certified</span>
                             </div>
                         </div>
                         <button
                             class="w-full h-10 sm:h-12 lg:h-14 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-brand-orange rounded-xl text-white font-roboto text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 enroll-button">
                             <i class="fas fa-play mr-2"></i>
                             Enroll Now
                         </button>
                     </div>
                 </a>
                 <!-- Card 3 -->
                 <a href="{{ route('course.details') }}"
                     class="course-card group bg-white rounded-2xl sm:rounded-3xl border border-gray-200 overflow-hidden hover:shadow-2xl hover:shadow-brand-orange/10 transition-all duration-500 hover:-translate-y-2 h-full">
                     <div class="relative overflow-hidden thumb">
                         <img src="{{ asset('photo/c3.jpg') }}" alt="Limitless Vastu"
                             class="w-full h-40 sm:h-48 lg:h-56 object-cover group-hover:scale-110 transition-transform duration-500" />
                         <div
                             class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                         </div>
                         <div
                             class="absolute top-3 sm:top-4 right-3 sm:right-4 bg-brand-red text-white px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-medium">
                             Beginner
                         </div>
                         <div
                             class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-white/90 backdrop-blur-sm text-brand-dark px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-bold">
                             ⭐ 4.7
                         </div>
                     </div>
                     <div class="p-4 sm:p-6 body">
                         <h3
                             class="font-roboto font-bold text-lg sm:text-xl lg:text-2xl text-brand-dark mb-2 sm:mb-3 group-hover:text-brand-red transition-colors">
                             Limitless Vastu
                         </h3>
                         <p class="font-roboto text-xs sm:text-sm lg:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed">
                             Master the basics of Vastu Shastra to harmonize your home and
                             energy. Designed for beginners with zero prior knowledge.
                         </p>
                         <div class="flex items-center justify-between mb-3 sm:mb-4 text-xs sm:text-sm">
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-clock mr-1 sm:mr-2"></i><span class="font-roboto">8 Weeks</span>
                             </div>
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-users mr-1 sm:mr-2"></i><span class="font-roboto">280+ Students</span>
                             </div>
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-certificate mr-1 sm:mr-2"></i><span class="font-roboto">Certified</span>
                             </div>
                         </div>
                         <button
                             class="w-full h-10 sm:h-12 lg:h-14 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-brand-orange rounded-xl text-white font-roboto text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 enroll-button">
                             <i class="fas fa-play mr-2"></i>
                             Enroll Now
                         </button>
                     </div>
                 </a>
                 <!-- Card 4 -->
                 <a href="{{ route('course.details') }}"
                     class="course-card group bg-white rounded-2xl sm:rounded-3xl border border-gray-200 overflow-hidden hover:shadow-2xl hover:shadow-brand-orange/10 transition-all duration-500 hover:-translate-y-2 h-full">
                     <div class="relative overflow-hidden thumb">
                         <img src="{{ asset('photo/c4.png') }}" alt="Advanced Astrology"
                             class="w-full h-40 sm:h-48 lg:h-56 object-cover group-hover:scale-110 transition-transform duration-500" />
                         <div
                             class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                         </div>
                         <div
                             class="absolute top-3 sm:top-4 right-3 sm:right-4 bg-purple-600 text-white px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-medium">
                             Advanced
                         </div>
                         <div
                             class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-white/90 backdrop-blur-sm text-brand-dark px-2 sm:px-3 py-1 rounded-full text-xs font-roboto font-bold">
                             ⭐ 4.9
                         </div>
                     </div>
                     <div class="p-4 sm:p-6 body">
                         <h3
                             class="font-roboto font-bold text-lg sm:text-xl lg:text-2xl text-brand-dark mb-2 sm:mb-3 group-hover:text-brand-red transition-colors">
                             Advanced Astrology Program
                         </h3>
                         <p class="font-roboto text-xs sm:text-sm lg:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed">
                             Deep dive into advanced predictive techniques, chart analysis,
                             and hidden secrets of astrology. For serious learners only.
                         </p>
                         <div class="flex items-center justify-between mb-3 sm:mb-4 text-xs sm:text-sm">
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-clock mr-1 sm:mr-2"></i><span class="font-roboto">16 Weeks</span>
                             </div>
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-users mr-1 sm:mr-2"></i><span class="font-roboto">200+ Students</span>
                             </div>
                             <div class="flex items-center text-brand-orange">
                                 <i class="fas fa-certificate mr-1 sm:mr-2"></i><span class="font-roboto">Certified</span>
                             </div>
                         </div>
                         <button
                             class="w-full h-10 sm:h-12 lg:h-14 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-brand-orange rounded-xl text-white font-roboto text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 enroll-button">
                             <i class="fas fa-play mr-2"></i>
                             Enroll Now
                         </button>
                     </div>
                 </a> --}}
             </div>
         </div>
     </main>
 @endsection
