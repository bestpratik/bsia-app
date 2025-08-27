@extends('frontend.layout.front-layout')
@section('content')
    <!-- Breadcrumb -->
    <section class="bg-gray-50 py-6">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
                <ol class="list-reset flex items-center gap-2">
                    <li><a href="/" class="hover:text-brand-red">Home</a></li>
                    <li><span class="text-gray-400">/</span></li>
                    <li class="text-brand-dark font-medium">eBooks</li>
                </ol>
            </nav>
            <h1 class="mt-2 font-playfair text-3xl md:text-5xl font-bold text-brand-dark">
                eBooks
            </h1>
        </div>
    </section>

    <!-- Toolbar -->
    <section class="py-4">
        <div class="container mx-auto px-4 max-w-7xl flex items-center justify-between">
            <p class="text-gray-600">A selection of helpful reading</p>
            <div class="view-toggle flex gap-2" data-target="#ebooks-page">
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
    <main id="ebooks-page" class="pb-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="items-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- eBook 1 -->
                <article
                    class="ebook-card group bg-white rounded-2xl sm:rounded-3xl border border-gray-200 overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="relative overflow-hidden thumb">
                        <img src="{{ asset('photo/c4.png') }}"
                            class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="Astrology Basics" />
                        <span class="price-badge">₹299</span>
                    </div>
                    <div class="body p-4 sm:p-6">
                        <h3 class="font-roboto font-bold text-lg sm:text-xl lg:text-2xl text-brand-dark mb-2">
                            Astrology Basics
                        </h3>
                        <p class="text-gray-600 text-sm lg:text-base">
                            An introduction to key concepts and charts.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-brand-orange text-sm">PDF • 120 pages</span>
                            <button class="buy-button">
                                <i class="fa fa-shopping-cart mr-2"></i>Buy Now
                            </button>
                        </div>
                    </div>
                </article>
                <!-- eBook 2 -->
                <article
                    class="ebook-card group bg-white rounded-2xl sm:rounded-3xl border border-gray-200 overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="relative overflow-hidden thumb">
                        <img src="{{ asset('photo/c5.png') }}"
                            class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="Palmistry Guide" />
                        <span class="price-badge">₹249</span>
                    </div>
                    <div class="body p-4 sm:p-6">
                        <h3 class="font-roboto font-bold text-lg sm:text-xl lg:text-2xl text-brand-dark mb-2">
                            Palmistry Guide
                        </h3>
                        <p class="text-gray-600 text-sm lg:text-base">
                            Understanding lines and mounts with examples.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-brand-orange text-sm">PDF • 98 pages</span>
                            <button class="buy-button">
                                <i class="fa fa-shopping-cart mr-2"></i>Buy Now
                            </button>
                        </div>
                    </div>
                </article>
                <!-- eBook 3 -->
                <article
                    class="ebook-card group bg-white rounded-2xl sm:rounded-3xl border border-gray-200 overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="relative overflow-hidden thumb">
                        <img src="{{ asset('photo/c6.png') }}"
                            class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="Vastu Primer" />
                        <span class="price-badge">₹199</span>
                    </div>
                    <div class="body p-4 sm:p-6">
                        <h3 class="font-roboto font-bold text-lg sm:text-xl lg:text-2xl text-brand-dark mb-2">
                            Vastu Primer
                        </h3>
                        <p class="text-gray-600 text-sm lg:text-base">
                            Practical Vastu tips for everyday spaces.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-brand-orange text-sm">PDF • 76 pages</span>
                            <button class="buy-button">
                                <i class="fa fa-shopping-cart mr-2"></i>Buy Now
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </main>
@endsection
