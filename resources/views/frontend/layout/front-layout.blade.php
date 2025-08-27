<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BS Institute Of Astrology - Learn Ancient Wisdom</title>

    <!-- Performance: preconnect/dns-prefetch -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://cdn.tailwindcss.com" />
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com" />
    <link rel="preconnect" href="https://cdn.jsdelivr.net" />
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net" />
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" />
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com" />
    <link rel="preconnect" href="https://code.jquery.com" />
    <link rel="dns-prefetch" href="https://code.jquery.com" />
    <link rel="preconnect" href="https://i.ytimg.com" />
    <link rel="dns-prefetch" href="https://i.ytimg.com" />
    <link rel="preconnect" href="https://www.youtube-nocookie.com" />
    <link rel="dns-prefetch" href="https://www.youtube-nocookie.com" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- owo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        libre: ["Libre Baskerville", "serif"],
                        roboto: ["Roboto", "sans-serif"],
                        playfair: ["Playfair Display", "serif"],
                    },
                    colors: {
                        "brand-red": "#900807",
                        "brand-orange": "#f26603",
                        "brand-dark": "#3d0000",
                        "brand-gold": "#FFD700",
                        "brand-purple": "#6B46C1",
                        "brand-blue": "#1E40AF",
                    },
                    screens: {
                        xs: "475px",
                        "3xl": "1600px",
                    },
                },
            },
        };
    </script>
</head>

<body>
    <!-- Top Bar -->
    <!-- navigation menu -->
    @include('frontend.layout.navigation-menu')
    <!-- navigation menu -->

    <!-- Main Header -->
    <!-- Header -->
    @include('frontend.layout.front-header')
    <!-- Header -->

    <!-- body content -->
    @yield('content')
    <!-- body content -->

    <!-- footer content -->
    @include('frontend.layout.front-footer')
    <!-- footer content -->

    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-brand-red to-red-700 text-white rounded-full shadow-2xl hover:shadow-brand-red/25 transition-all duration-300 transform hover:scale-110 opacity-0 invisible z-50 enroll-button">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Slick Carousel JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="main.js"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new WOW({
                boxClass: "wow",
                animateClass: "animate__animated",
                offset: 0,
                mobile: true,
                live: true,
            }).init();
        });
    </script>
    <script>
        $(function() {
            // 1) Mobile menu toggle
            $("#mobile-menu-btn").on("click", function() {
                $("#mobile-menu, #mobile-menu-overlay").addClass("open show");
                $("body").addClass("overflow-hidden");
            });
            $("#close-menu, #mobile-menu-overlay, #mobile-menu nav a").on(
                "click",
                function() {
                    $("#mobile-menu, #mobile-menu-overlay").removeClass("open show");
                    $("body").removeClass("overflow-hidden");
                }
            );

            // 2) Smooth scrolling for anchors (header offset)
            $('a[href^="#"]').on("click", function(e) {
                e.preventDefault();
                let tgt = $($(this).attr("href"));
                if (!tgt.length) return;
                let offset = $("header").outerHeight() + 10;
                $("html,body").animate({
                        scrollTop: tgt.offset().top - offset,
                    },
                    600,
                    "swing"
                );
            });

            // 3) Back-to-Top button
            const backToTop = $("#back-to-top");
            $(window).on("scroll", function() {
                backToTop.toggleClass("show", $(this).scrollTop() > 300);
            });
            backToTop.on("click", function(e) {
                e.preventDefault();
                $("html,body").animate({
                    scrollTop: 0
                }, 600, "swing");
            });

            // 4) Hero slider
            $(".hero-slider").slick({
                infinite: false,
                fade: true,
                speed: 800,
                arrows: true,
                dots: true,
                autoplay: false,
                prevArrow: '<button class="slick-prev"></button>',
                nextArrow: '<button class="slick-next"></button>',
                responsive: [{
                    breakpoint: 640,
                    settings: {
                        arrows: false,
                    },
                }, ],
            });

            // Lazy init/teardown hero video to avoid heavy embedding on load
            const setHeroVideo = (shouldPlay) => {
                const $iframe = $(".hero-slider .video-slide iframe");
                if (!$iframe.length) return;
                const dataSrc = $iframe.attr("data-src");
                if (shouldPlay) {
                    // Load once and use YouTube Player API to play quickly
                    if (!$iframe.attr("src")) {
                        $iframe.attr("src", dataSrc);
                    }
                    try {
                        // PostMessage play command (YT API lightweight)
                        $iframe[0].contentWindow.postMessage(
                            JSON.stringify({
                                event: "command",
                                func: "playVideo",
                                args: []
                            }),
                            "*"
                        );
                    } catch (e) {}
                } else {
                    try {
                        $iframe[0].contentWindow.postMessage(
                            JSON.stringify({
                                event: "command",
                                func: "pauseVideo",
                                args: []
                            }),
                            "*"
                        );
                    } catch (e) {}
                }
            };

            // Play only when the video slide is active
            $(".hero-slider").on("afterChange init", function(e, slick, currentSlide) {
                const index = typeof currentSlide === "number" ? currentSlide : slick.currentSlide;
                const $current = $(slick.$slides[index]);
                const isVideo = $current.hasClass("video-slide");
                setHeroVideo(isVideo);
            });
            $(".hero-slider").on("beforeChange", function() {
                setHeroVideo(false);
            });

            $(".courses-slider, .testimonials-slider").each(function() {
                const $this = $(this);
                const isTestimonial = $this.hasClass("testimonials-slider");
                // default slides to show
                const defaultShow = isTestimonial ? 3 : 3;
                // odd check
                const oddDefault = defaultShow % 2 !== 0;

                $this.slick({
                    dots: true,
                    infinite: true,
                    speed: 600,
                    slidesToShow: defaultShow,
                    // only centerMode if testimonial slider AND odd count
                    centerMode: isTestimonial && oddDefault,
                    centerPadding: "0px",
                    arrows: true,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: isTestimonial ? 2 : 2,
                                // recalc odd for this breakpoint
                                centerMode: isTestimonial && 2 % 2 !== 0,
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                arrows: false,
                                centerMode: isTestimonial && 1 % 2 !== 0,
                            },
                        },
                    ],
                });
            });

            // 6) Video reviews slider
            $(".video-reviews-slider").slick({
                dots: true,
                infinite: true,
                speed: 600,
                slidesToShow: 3,
                centerMode: false,
                centerPadding: "0px",
                arrows: true,
                autoplay: false,
                autoplaySpeed: 5000,
                pauseOnHover: true,
                adaptiveHeight: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            centerMode: false,
                            adaptiveHeight: true,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                            centerMode: false,
                            adaptiveHeight: true,
                        },
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                            centerMode: false,
                            dots: true,
                            adaptiveHeight: true,
                        },
                    },
                ],
            });

            // Ensure slick recalculates sizes after all assets load
            $(window).on("load", function() {
                $(".video-reviews-slider").slick("setPosition");
            });

            // View toggle handlers (grid/list) with explicit targets
            const initViewToggles = () => {
                $(".view-toggle").each(function() {
                    const $toggle = $(this);
                    const targetSelector = $toggle.data("target") || "#courses-page, #ebooks-page";
                    const $targets = $(targetSelector);
                    if (!$targets.length) return;
                    const $gridBtn = $toggle.find('[data-view="grid"]');
                    const $listBtn = $toggle.find('[data-view="list"]');
                    const setView = (mode) => {
                        if (mode === "list") {
                            $targets.addClass("list-view");
                            $listBtn.addClass("active");
                            $gridBtn.removeClass("active");
                        } else {
                            $targets.removeClass("list-view");
                            $gridBtn.addClass("active");
                            $listBtn.removeClass("active");
                        }
                    };
                    $gridBtn.off("click").on("click", () => setView("grid"));
                    $listBtn.off("click").on("click", () => setView("list"));
                });
            };

            initViewToggles();

            // Helper to replace thumb with video and play
            const replaceThumbWithVideo = ($thumb) => {
                const src = $thumb.data("video-src");
                const poster = $thumb.data("poster") || "";
                if (!src) return null;
                const video = $(
                    `<video class="absolute inset-0 w-full h-full" controls playsinline muted preload="metadata" poster="${poster}"><source src="${src}" type="video/mp4" /></video>`
                );
                $thumb.replaceWith(video);
                const el = video.get(0);
                try {
                    el.play();
                } catch (e) {}
                el.addEventListener("error", () => {
                    const placeholder = $(`
        <div class="absolute inset-0 flex items-center justify-center bg-black/70 text-white text-center p-4 placeholder-msg">
          <div>
            <div class="mb-2 font-roboto">Video file not found</div>
            <div class="text-xs opacity-80">Expected at: ${src}</div>
          </div>
        </div>
      `);
                    video.after(placeholder);
                });
                return video;
            };

            // Click-to-play for local video thumbnails
            $(document).on("click", ".local-video-thumb", function() {
                replaceThumbWithVideo($(this));
            });

            // Pause any playing local videos when slide changes
            $(".video-reviews-slider").on("beforeChange", function() {
                $(this)
                    .find("video")
                    .each(function() {
                        try {
                            this.pause();
                        } catch (e) {}
                    });
            });

            // Auto-start the first visible testimonial video on init/afterChange
            const autoStartFirstActiveVideo = () => {
                const $slider = $(".video-reviews-slider");
                const $activeSlides = $slider.find(".slick-active");
                if (!$activeSlides.length) return;
                const $first = $($activeSlides.get(0));
                const $existingVideo = $first.find("video");
                if ($existingVideo.length) {
                    try {
                        $existingVideo.get(0).play();
                    } catch (e) {}
                    return;
                }
                const $thumb = $first.find(".local-video-thumb");
                if ($thumb.length) replaceThumbWithVideo($thumb);
            };

            $(".video-reviews-slider").on("init", autoStartFirstActiveVideo);
            $(".video-reviews-slider").on("afterChange", autoStartFirstActiveVideo);
        });
    </script>
</body>

</html>
