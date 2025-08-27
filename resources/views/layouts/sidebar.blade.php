<nav class="px-2 space-y-1">
    {{-- Dashboard --}}
    <a href="{{ route('dashboard') }}"
        class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
                @if (request()->routeIs('dashboard')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-squares-2x2
            class="mr-3 h-6 w-6 @if (request()->routeIs('dashboard')) text-white @else text-[25304e] @endif" />
        <span class="sidebar-item-text">Dashboard</span>
    </a>

    <!-- Course -->
    <a href="{{ url('course') }}"
        class="flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
           @if (request()->is('course*')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-book-open
            class="w-5 h-5 mr-3 flex-shrink-0 
                @if (request()->is('course*')) text-white @else text-[25304e] @endif" />
        <span>Course</span>
    </a>

    <!-- Ebook -->
    <a href="{{ url('ebook') }}"
        class="flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
           @if (request()->is('ebook*')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-document-text
            class="w-5 h-5 mr-3 flex-shrink-0 
                @if (request()->is('ebook*')) text-white @else text-[25304e] @endif" />
        <span>Ebook</span>
    </a>

    {{-- <!-- Coursefaq -->
    <a href="{{ url('coursefaq') }}"
        class="flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
           @if (request()->is('coursefaq*')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-question-mark-circle
            class="w-5 h-5 mr-3 flex-shrink-0 
                @if (request()->is('coursefaq*')) text-white @else text-[25304e] @endif" />
        <span>Coursefaq</span>
    </a> --}}

    <!-- About -->
    <a href="{{ url('about') }}"
        class="flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
           @if (request()->is('about*')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-information-circle
            class="w-5 h-5 mr-3 flex-shrink-0 
                @if (request()->is('about*')) text-white @else text-[25304e] @endif" />
        <span>About</span>
    </a>

    <!-- Banner -->
    <a href="{{ url('banner') }}"
        class="flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
           @if (request()->is('banner*')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-photo
            class="w-5 h-5 mr-3 flex-shrink-0 
                @if (request()->is('banner*')) text-white @else text-[25304e] @endif" />
        <span>Banner</span>
    </a>

    <!--Testimonial-->
    <a href="{{ url('testimonial') }}"
        class="flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
           @if (request()->is('testimonial*')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-star
            class="w-5 h-5 mr-3 flex-shrink-0 
                @if (request()->is('testimonial*')) text-white @else text-[25304e] @endif" />
        <span>Testimonial</span>
    </a>

    <!--Video Testimonial-->
    <a href="{{ url('videotestimonial') }}"
        class="flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all
           @if (request()->is('videotestimonial*')) bg-[#112695] text-white @else text-gray-600 hover:bg-blue-100 hover:text-blue-700 @endif">
        <x-heroicon-o-video-camera
            class="w-5 h-5 mr-3 flex-shrink-0 
                @if (request()->is('videotestimonial*')) text-white @else text-[25304e] @endif" />
        <span>Video Testimonial</span>
    </a>
</nav>
