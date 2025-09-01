<body class="bg-white !overflow-x-hidden">
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay"
        class="fixed inset-0 bg-black bg-opacity-70 z-40 opacity-0 invisible transition-all duration-300 backdrop-blur-sm">
    </div>
    <!-- Mobile Offcanvas Menu -->
    <div id="mobile-menu"
        class="fixed top-0 right-0 h-full w-80 max-w-[85vw] bg-gradient-to-br from-brand-dark via-brand-red to-red-900 shadow-2xl transform translate-x-full transition-transform duration-500 ease-out z-50">
        <div class="p-6 h-full flex flex-col relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-20 h-20 border border-white/30 rounded-full"></div>
                <div class="absolute top-32 right-8 w-16 h-16 border border-white/20 rounded-full"></div>
                <div class="absolute bottom-20 left-6 w-12 h-12 border border-white/25 rounded-full"></div>
            </div>

            <div class="flex justify-between items-center mb-8 pb-4 border-b border-white/20 relative z-10">
                <div class="flex items-center">
                    <img src="{{ asset('photo/logo-bisa.png') }}" alt="Logo" class="w-12 h-12 rounded-xl shadow-lg"
                        decoding="async" />
                    <div class="ml-3">
                        <h2 class="text-lg font-bold font-libre text-white">BSIA</h2>
                        <p class="text-xs text-white/70 font-roboto">Ancient Wisdom</p>
                    </div>
                </div>
                <button id="close-menu"
                    class="text-white hover:text-brand-gold transition-all duration-300 p-1 rounded-lg hover:bg-white/10 enroll-button h-10 w-10 rounded-xl">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <nav class="flex-1 space-y-2 relative z-10">
                <a href="/"
                    class="flex items-center px-4 py-4 rounded-xl transition-all duration-300 group transform hover:translate-x-2 
       {{ request()->is('/') ? 'bg-white/15 text-brand-gold' : 'text-white hover:bg-white/15' }}">
                    <i
                        class="fas fa-home mr-4 text-brand-gold group-hover:scale-125 transition-transform duration-300"></i>
                    <span class="font-roboto text-lg font-medium">Home</span>
                </a>

                <a href="{{ route('courses') }}"
                    class="flex items-center px-4 py-4 rounded-xl transition-all duration-300 group transform hover:translate-x-2 
       {{ request()->routeIs('courses') ? 'bg-white/15 text-brand-gold' : 'text-white hover:bg-white/15' }}">
                    <i
                        class="fas fa-graduation-cap mr-4 text-brand-gold group-hover:scale-125 transition-transform duration-300"></i>
                    <span class="font-roboto text-lg font-medium">Courses</span>
                </a>

                <a href="{{ route('ebooks') }}"
                    class="flex items-center px-4 py-4 rounded-xl transition-all duration-300 group transform hover:translate-x-2 
       {{ request()->routeIs('ebooks') ? 'bg-white/15 text-brand-gold' : 'text-white hover:bg-white/15' }}">
                    <i
                        class="fas fa-info-circle mr-4 text-brand-gold group-hover:scale-125 transition-transform duration-300"></i>
                    <span class="font-roboto text-lg font-medium">E-book</span>
                </a>

                <!-- <a
            href="#testimonials"
            class="flex items-center px-4 py-4 text-white hover:bg-white/15 rounded-xl transition-all duration-300 group transform hover:translate-x-2"
          >
            <i
              class="fas fa-star mr-4 text-brand-gold group-hover:scale-125 transition-transform duration-300"
            ></i>
            <span class="font-roboto text-lg font-medium">Testimonials</span>
          </a>
          <a
            href="#contact"
            class="flex items-center px-4 py-4 text-white hover:bg-white/15 rounded-xl transition-all duration-300 group transform hover:translate-x-2"
          >
            <i
              class="fas fa-envelope mr-4 text-brand-gold group-hover:scale-125 transition-transform duration-300"
            ></i>
            <span class="font-roboto text-lg font-medium">Contact</span>
          </a> -->
            </nav>

            <div class="pt-6 space-y-3 border-t border-white/20 relative z-10">
                <button
                    class="w-full py-3 px-6 border-2 border-brand-gold text-brand-gold rounded-xl hover:bg-brand-gold hover:text-brand-dark transition-all duration-300 font-roboto font-medium transform hover:scale-105 enroll-button">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Log in
                </button>
                <button
                    class="w-full py-3 px-6 bg-gradient-to-r from-brand-gold to-yellow-400 text-brand-dark rounded-xl hover:from-yellow-400 hover:to-brand-gold transition-all duration-300 font-roboto font-medium shadow-lg transform hover:scale-105 enroll-button">
                    <i class="fas fa-rocket mr-2"></i>
                    Enroll Now
                </button>
            </div>
        </div>
    </div>
</body>
