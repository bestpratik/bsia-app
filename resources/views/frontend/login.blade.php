@extends('frontend.layout.front-layout')
@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-50 border-b border-gray-200 py-4">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-brand-red transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <span class="text-gray-400">/</span>
                <span class="text-brand-red font-medium">Login</span>
            </nav>
        </div>
    </div>

    <!-- Login Form Section -->
    <section class="py-5 sm:py-6 lg:py-12 bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4 max-w-md">
            <div class="wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 border border-gray-100">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="font-playfair font-bold text-3xl sm:text-4xl text-brand-dark mb-2">
                            Welcome Back
                        </h2>
                        <p class="font-roboto text-gray-600 text-base">
                            Sign in to your BSIA account
                        </p>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block font-roboto font-medium text-gray-700 text-sm">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email') }}"
                                    class="block w-full pl-10 pr-4 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-xl focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-all duration-300 font-roboto text-gray-900 placeholder-gray-500"
                                    placeholder="Enter your email" required autofocus />
                            </div>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block font-roboto font-medium text-gray-700 text-sm">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="block w-full pl-10 pr-4 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-xl focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-all duration-300 font-roboto text-gray-900 placeholder-gray-500"
                                    placeholder="Enter your password" required />
                                <button type="button" id="toggle-password"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" id="remember" name="remember"
                                    class="h-4 w-4 text-brand-red focus:ring-brand-red border-gray-300 rounded"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <span class="ml-2 font-roboto text-sm text-gray-700">Remember me</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="font-roboto text-sm text-brand-red hover:text-red-700 transition-colors">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full mt-3 bg-gradient-to-r from-brand-red to-red-700 text-white font-roboto font-semibold py-3 px-6 rounded-xl hover:from-red-700 hover:to-brand-red transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="my-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500 font-roboto">Or continue with</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="space-y-3">
                        <a href="#"
                            class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition-all duration-300 font-roboto text-gray-700 hover:text-gray-900">
                            <i class="fab fa-google text-red-500 mr-3"></i>
                            Continue with Google
                        </a>
                        <a href="#"
                            class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition-all duration-300 font-roboto text-gray-700 hover:text-gray-900">
                            <i class="fab fa-facebook text-blue-600 mr-3"></i>
                            Continue with Facebook
                        </a>
                    </div>

                    <!-- Sign Up Link -->
                    <div class="text-center mt-8 pt-6 border-t border-gray-200">
                        <p class="font-roboto text-gray-600 text-sm">
                            Don't have an account?
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-brand-red hover:text-red-700 font-medium transition-colors">
                                    Sign up here
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
    </section>
    {{-- @auth
        @if (auth()->user()->role === 'user')
            <script>
                window.location.href = "{{ route('dashboard') }}";
            </script>
        @endif
    @endauth --}}
@endsection