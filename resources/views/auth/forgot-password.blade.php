@extends('frontend.layout.front-layout')
@section('content')
    <!-- Breadcrumb -->
    {{-- <div class="bg-gray-50 border-b border-gray-200 py-4">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-brand-red transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <span class="text-gray-400">/</span>
                <span class="text-brand-red font-medium">Login</span>
            </nav>
        </div>
    </div> --}}

    <!-- Login Form Section -->
    <section class="py-5 sm:py-6 lg:py-12 bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4 max-w-md">
            <div class="wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 border border-gray-100">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="font-playfair font-bold text-3xl sm:text-4xl text-brand-dark mb-2">
                            Forgot Password
                        </h2>
                        {{-- <p class="font-roboto text-gray-600 text-base">
                            Sign in to your BSIA account
                        </p> --}}
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>
                    

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full px-4 py-3 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email"
                                :value="old('email')" required autofocus placeholder="Enter your email address"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>



                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full mt-3 bg-gradient-to-r from-brand-red to-red-700 text-white font-roboto font-semibold py-3 px-6 rounded-xl hover:from-red-700 hover:to-brand-red transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            Email Password Reset Link
                        </button>
                    </form>

                    <!-- Sign Up Link -->
                    <div class="text-center mt-8 pt-6 border-t border-gray-200">
                        <p class="font-roboto text-gray-600 text-sm">
                            Already have an account?
                            <a href="{{ route('front.login') }}"
                                class="text-brand-red hover:text-red-700 font-medium transition-colors">
                                Sign in here
                            </a>

                        </p>
                    </div>
                </div>
            </div>
    </section>

    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    {{-- <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
@endsection
