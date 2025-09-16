<!-- Header Section -->
<header id="home"
    class="sticky top-0 z-40 w-full bg-white/95 backdrop-blur-md py-2 sm:py-3 lg:py-4 shadow-lg border-b border-gray-100"
    data-wow-offset="0" data-wow-duration="1s">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex items-center justify-between">
            <!-- Logo + Title -->
            <div class="flex items-center flex-1 lg:flex-none">
                <a href="/">
                    <img src="{{ asset('photo/logo-bisa.png') }}" alt="BSIA Logo"
                        class="h-10 w-10 sm:h-12 sm:w-12 lg:h-16 lg:w-16 rounded-xl shadow-lg wow animate__animated animate__zoomIn"
                        data-wow-delay="0.5s" decoding="async" />
                </a>
                <div class="ml-3">
                    <h1 class="font-playfair font-bold text-brand-dark text-xl sm:text-2xl lg:text-3xl">
                        BS Institute Of Astrology
                    </h1>
                    <p class="hidden sm:block text-xs lg:text-sm text-brand-orange font-roboto">
                        Ancient Wisdom, Modern Learning
                    </p>
                </div>
            </div>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex space-x-6 flex-1 justify-end me-3">
                <a href="/"
                    class="nav-link font-roboto text-sm xl:text-base 2xl:text-lg transition-colors duration-300 py-2 px-3 rounded-lg wow animate__animated animate__fadeInUp
       {{ request()->is('/') ? 'text-brand-red bg-gray-50' : 'text-gray-800 hover:text-brand-red hover:bg-gray-50' }}"
                    data-wow-delay="0.2s">Home</a>

                <a href="{{ route('courses') }}"
                    class="nav-link font-roboto text-sm xl:text-base 2xl:text-lg transition-colors duration-300 py-2 px-3 rounded-lg wow animate__animated animate__fadeInUp
       {{ request()->routeIs('courses') ? 'text-brand-red bg-gray-50' : 'text-gray-800 hover:text-brand-red hover:bg-gray-50' }}"
                    data-wow-delay="0.3s">Courses</a>

                <a href="{{ route('ebooks') }}"
                    class="nav-link font-roboto text-sm xl:text-base 2xl:text-lg transition-colors duration-300 py-2 px-3 rounded-lg wow animate__animated animate__fadeInUp
       {{ request()->routeIs('ebooks') ? 'text-brand-red bg-gray-50' : 'text-gray-800 hover:text-brand-red hover:bg-gray-50' }}"
                    data-wow-delay="0.4s">E-book</a>

                <!-- <a
              href="#testimonials"
              class="nav-link font-roboto text-gray-800 text-sm xl:text-base 2xl:text-lg transition-colors duration-300 py-2 px-3 rounded-lg hover:text-brand-red hover:bg-gray-50 wow animate__animated animate__fadeInUp"
              data-wow-delay="0.5s"
              >Testimonials</a
            >
            <a
              href="#footer"
              class="nav-link font-roboto text-gray-800 text-sm xl:text-base 2xl:text-lg transition-colors duration-300 py-2 px-3 rounded-lg hover:text-brand-red hover:bg-gray-50 wow animate__animated animate__fadeInUp"
              data-wow-delay="0.6s"
              >Contact</a
            > -->
            </nav>

            <!-- Buttons + Mobile Toggle -->
            <div class="flex items-center space-x-4">
                <!-- Log in -->
                @guest
                    {{-- Show login if not logged in --}}
                    <a href="{{ route('front.login') }}">
                        <button
                            class="hidden md:inline-block enroll-button h-8 xl:h-10 px-4 rounded-lg border-2 border-brand-red font-roboto text-brand-red hover:bg-brand-red hover:text-white transition-all duration-300 transform hover:scale-105 wow animate__animated animate__bounceIn"
                            data-wow-delay="0.8s">
                            Log in
                        </button>
                    </a>
                @endguest

                @auth
                    {{-- Show logout if logged in --}}
                    @if (Auth::user()->role === 'user')
                        {{-- Show logout only for normal users --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="hidden md:inline-block enroll-button h-8 xl:h-10 px-4 rounded-lg border-2 border-brand-red font-roboto text-brand-red hover:bg-brand-red hover:text-white transition-all duration-300 transform hover:scale-105 wow animate__animated animate__bounceIn"
                                data-wow-delay="0.8s">
                                Log out
                            </button>
                        </form>
                    @endif

                    @if (Auth::user()->role === 'admin')
                        {{-- Example: Show admin dashboard button --}}
                        <a href="{{ route('front.login') }}">
                            <button
                                class="hidden md:inline-block enroll-button h-8 xl:h-10 px-4 rounded-lg border-2 border-brand-red font-roboto text-white bg-brand-red hover:bg-red-700 transition-all duration-300 transform hover:scale-105 wow animate__animated animate__bounceIn"
                                data-wow-delay="0.8s">
                                Log in
                            </button>
                        </a>
                    @endif
                @endauth


                <!-- Enroll Now -->
                <button
                    class="hidden md:inline-block enroll-button h-8 xl:h-10 px-4 rounded-lg bg-gradient-to-r from-brand-red to-red-700 font-roboto text-white hover:from-red-700 hover:to-brand-red transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 wow animate__animated animate__zoomIn"
                    data-wow-delay="1s">
                    Enroll Now
                </button>

                @auth
                    <div class="relative" id="profileDropdownRoot">
                        <!-- Toggle button: NOTE type="button" to avoid accidental form submits -->
                        <button id="profileToggle" type="button" aria-expanded="false" aria-controls="profileMenu"
                            class="w-10 h-10 rounded-full bg-brand-red text-white flex items-center justify-center shadow-md hover:scale-105 transition-transform">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </button>

                        <!-- Menu (hidden by default) -->
                        <div id="profileMenu"
                            class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50"
                            role="menu" aria-orientation="vertical" aria-labelledby="profileToggle">
                            <a href="{{ route('user.dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Dashboard</a>

                        {{-- <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Profile</a> --}}

                            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn"
                    class="lg:hidden p-2 rounded-lg text-gray-800 hover:text-brand-red transition-all duration-300 wow animate__animated animate__fadeInRight"
                    data-wow-delay="1.2s">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</header>
