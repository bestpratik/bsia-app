@extends('frontend.layout.front-layout')
@section('content')
    <section class="py-5 sm:py-6 lg:py-12 bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4 max-w-md">
            <div class="wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 border border-gray-100">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="font-playfair font-bold text-3xl sm:text-4xl text-brand-dark mb-2">
                            Reset Password
                        </h2>
                        {{-- <p class="font-roboto text-gray-600 text-base">
                            Sign in to your BSIA account
                        </p> --}}
                    </div>
                    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email"
                                class="block mt-1 w-full px-4 py-3 text-lg rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                type="email" name="email" :value="old('email', $request->email)" required autofocus
                                autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password"
                                class="block mt-1 w-full px-4 py-3 text-lg rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                type="password" name="password" required autocomplete="new-password" placeholder="Enter new password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation"
                                class="block mt-1 w-full px-4 py-3 text-lg rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Enter confirm password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="px-6 py-3 text-lg">
                                {{ __('Reset Password') }}
                            </x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
    </section>
@endsection
