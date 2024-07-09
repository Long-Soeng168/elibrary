<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ebooks</title>

    <!-- Start CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pdfview.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/audioplayer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/no-tailwind.css') }}" />

    <!-- <style>
        body ::selection {
            background-color: goldenrod; /* This is bg-blue-900 in Tailwind */
            color: white; /* This is text-white in Tailwind */
        }
    </style> -->

    <!-- end Start CSS -->

    <!-- Start JS -->
    <script src="{{ asset('assets/js/tailwind34.js') }}"></script>
    <script src="{{ asset('assets/js/darkModeHead.js') }}"></script>
    <script src="{{ asset('assets/js/swiper11.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/tailwind.config.js') }}"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Moul&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Siemreap&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class", // Enables dark mode based on class
            theme: {
                extend: {
                    colors: {
                        clifford: "#da373d",
                        // primary: "#00aff0",
                        // primaryHover: "#0a9fd5",
                        primary: "{{ $websiteInfo->primary }}",
                        primaryHover: "{{ $websiteInfo->primary_hover }}",
                        bannerColor: "{{ $websiteInfo->banner_color }}",
                        warning: "#fab105",
                        warningHover: "#ffb915",
                    },
                },
                fontFamily: {
                    moul: [
                        "Moul", "Siemreap", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system",
                        "system-ui", "Segoe UI", "Helvetica Neue",
                    ],
                    siemreap: [
                        "Siemreap", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system", "system-ui",
                        "Segoe UI", "Helvetica Neue",
                    ],
                    poppins: [
                        "Poppins", "Roboto", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system",
                        "system-ui", "Segoe UI", "Helvetica Neue",
                    ],

                },
            },
        };
    </script>
    <script defer src="{{ asset('assets/js/alpine31.js') }}"></script>
    <script defer src="{{ asset('assets/js/darkMode.js') }}"></script>
    <script defer src="{{ asset('assets/js/flowbite23.js') }} "></script>
    <script defer src="{{ asset('assets/js/pdfPopup.js') }}"></script>
    <script defer src="{{ asset('assets/js/glightbox.js') }}"></script>
    <script defer src="{{ asset('assets/js/glightbox.config.js') }}"></script>
    <!-- End JS -->
</head>

<body class="w-full overflow-x-hidden dark:bg-gray-800">
    <!-- Head -->
    <div>
        <div class="relative w-full px-2 bg-bannerColor xl:px-0">
            <a href="/">
                <img class="max-w-screen-xl mx-auto w-full max-h-[300px] dark:saturate-500"
                    src="{{ asset('assets/images/website_infos/' . $websiteInfo->banner) }}" alt="" />
            </a>

            <header class="md:absolute left-0 right-0 bottom-0 z-[30]
                {{ $websiteInfo->show_bg_menu ? 'bg-bannerColor/50' : '' }}
            ">
                <div class="z-20 px-2 text-white border-gray-200 bg-primary-400">
                    <div class="flex flex-wrap items-center justify-end max-w-screen-xl mx-auto">
                        <div
                            class="py-1.5 lg:order-2 justify-items-end max-[1280px]:w-full max-[1280px]:flex max-[1280px]:justify-end max-[1280px]:items-center">
                            <div class="shrink-0">
                                <!-- Toggle Dark mode -->
                                <button id="theme-toggle" type="button"
                                    class="p-2 text-sm text-gray-100 rounded-lg hover:text-gray-500 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-200 dark:hover:text-gray-600 focus:outline-none ">
                                    <svg id="theme-toggle-dark-icon" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                        </path>
                                    </svg>
                                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            fill-rule="evenodd" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <!-- Start Language -->
                                <a href="#" type="button"
                                    class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200 dark:hover:text-white">
                                    <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/khmer.png') }}"
                                        alt="" />
                                </a>
                                <a href="#" type="button"
                                    class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 bg-gray-100 rounded-lg cursor-pointer dark:bg-gray-200 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-white">
                                    <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/english.png') }}"
                                        alt="" />
                                </a>
                                {{-- End Language --}}
                                <button type="button" data-drawer-target="drawer-body-scrolling"
                                    data-drawer-show="drawer-body-scrolling" data-drawer-body-scrolling="true"
                                    aria-controls="drawer-body-scrolling"
                                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-100 hover:text-gray-500 rounded-lg min-[1280px]:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-200 dark:hover:text-gray-700 dark:hover:bg-gray-200 dark:focus:ring-gray-600">
                                    <span class="sr-only">Open main menu</span>
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 17 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h15M1 7h15M1 13h15"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- ================== Menu Navigator ================== -->
                        <nav class="py-1 md:py-4 pl-2 mr-10 hidden w-full min-[1280px]:block min-[1280px]:w-auto"
                            id="navbar-default">
                            <ul
                                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg text-md md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                                <li
                                    class="transition-all border-b-2 border-opacity-0 hover:border-opacity-100 border-b-white {{ request()->is('/') ? 'border-opacity-100' : '' }}  ">
                                    <a href="/"
                                        class="block px-3 py-2 rounded md:border-0 md:p-0 dark:text-white">
                                        Home
                                    </a>
                                </li>
                                @forelse ($menu_pages as $item)
                                    <li
                                        class="transition-all border-b-2 border-opacity-0 hover:border-opacity-100 border-b-white {{ request()->is('menu/' . $item->id) ? 'border-opacity-100' : '' }}   ">
                                        <a href="{{ url('/menu/' . $item->id) }}"
                                            class="block px-3 py-2 rounded md:border-0 md:p-0 dark:text-white">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                                <li
                                    class="transition-all border-b-2 border-opacity-0 hover:border-opacity-100 border-b-white">
                                    @if (auth()->check())
                                        <a href="{{ url('/admin/dashboard') }}" {{-- <a href="{{ url('/logout') }}" --}}
                                            class="block px-3 py-2 rounded md:border-0 md:p-0 dark:text-white">
                                            Admin
                                        </a>
                                    @else
                                        <a href="{{ url('/login') }}"
                                            class="block px-3 py-2 rounded md:border-0 md:p-0 dark:text-white">
                                            Login
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
        <aside id="drawer-body-scrolling"
            class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform bg-white min-w-64 max-w-[90vw] dark:bg-gray-800 -translate-x-full"
            tabindex="-1" aria-labelledby="drawer-body-scrolling-label" aria-hidden="true">
            <h5 id="drawer-body-scrolling-label"
                class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                MENU
            </h5>
            <button type="button" data-drawer-hide="drawer-body-scrolling" aria-controls="drawer-body-scrolling"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <!-- Drawer Menu -->
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/"
                            class="{{ request()->is('/') ? 'underline' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">Home</span>
                        </a>
                    </li>

                    @forelse ($menu_pages as $item)
                        <li>
                            <a href="{{ url('/menu/' . $item->id) }}"
                                class="{{ request()->is('menu/' . $item->id) ? 'underline' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="ms-3">{{ $item->name }}</span>
                            </a>
                        </li>
                    @empty
                    @endforelse

                    <li>
                        @if (auth()->check())
                            <a href="{{ url('/admin/dashboard') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="ms-3">Admin</span>
                            </a>
                        @else
                            <a href="{{ url('/login') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="ms-3">Login</span>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </aside>
    </div>
    <!-- End Head -->

    @yield('content')

    <!-- Footer -->
    <div class="text-white bg-primary dark:bg-gray-900">
        <div class="max-w-screen-xl mx-auto mt-6">
            <footer class="m-2 xl:m-0">
                <div class="w-full max-w-screen-xl py-6 mx-auto lg:py-8">
                    <div class="min-[1300px]:flex md:justify-between">
                        <div class="mb-6 min-[1300px]:mb-0">
                            <a href="#" class="flex items-center">
                                <img src="{{ asset('assets/images/website_infos/' . $websiteInfo->image) }}"
                                    class="h-24 max-w-[250px] object-contain me-3" alt="Logo" />
                            </a>
                        </div>
                        <div class="justify-between gap-6 lg:flex lg:gap-20">
                            <div class="max-w-[500px]">
                                <h2 class="mb-3 text-sm font-semibold uppercase dark:text-white">
                                    {{ $footer->name }}
                                </h2>
                                <ul class="mb-8 font-medium dark:text-gray-400">
                                    <li class="mb-4">
                                        {{-- <p>
                                            Building (5th Floor), St,National Assembly, Sangkat
                                            Tonle Basac, Khan Chamka Mon, Phnom Penh, Cambodia
                                            <span><a href="#">Google Maps</a></span>
                                        </p>
                                        <p>Phone Number : +855 99 999 999</p>
                                        <p>Email : beltei@beltei.kh</p> --}}
                                        {!! $footer->description !!}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="mb-3 text-sm font-semibold uppercase dark:text-white lg:text-center">
                                    Download App
                                </h2>
                                <ul class="mb-8 font-medium dark:text-gray-400">
                                    <li class="mb-4">
                                        <button type="button"
                                            class="bg-transparent hover:bg-white dark:hover:bg-gray-400 border-2 border-white dark:border-gray-400 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center gap-2 hover:text-gray-600 dark:hover:text-white hover:scale-110 transition-all">
                                            <img src="{{ asset('assets/icons/mobile-app.png') }}" alt=""
                                                class="h-8" />

                                            Click Download
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="mb-3 text-sm font-semibold uppercase dark:text-white lg:text-center">
                                    Social Links
                                </h2>

                                <div class="flex flex-wrap gap-2 mt-4 mb-4 lg:justify-center sm:mt-0">
                                    @forelse ($links as $item)
                                        <a target="_blank" href="{{ $item->link }}"
                                            class="hover:text-gray-900 dark:hover:text-white">
                                            <img class="h-[55px] aspect-square object-contain rounded-full border border-white hover:scale-110 transition-all"
                                                src="{{ asset('assets/images/links/' . $item->image) }}"
                                                alt="Facebook page" />
                                            <span class="sr-only">{{ $item->name }}</span>
                                        </a>
                                    @empty
                                    @endforelse

                                    {{-- <a href="#" class="hover:text-gray-900 dark:hover:text-white">
                                        <img class="h-[55px] aspect-square object-contain rounded-full border border-white hover:scale-110 transition-all"
                                            src="{{ asset('assets/icons/youtube.png') }}" alt="Facebook page" />
                                        <span class="sr-only">Youtube</span>
                                    </a>
                                    <a href="#" class="hover:text-gray-900 dark:hover:text-white">
                                        <img class="h-[55px] aspect-square object-contain rounded-full border border-white hover:scale-110 transition-all"
                                            src="{{ asset('assets/icons/telegram.png') }}" alt="Facebook page" />
                                        <span class="sr-only">Telegram</span>
                                    </a>
                                    <a href="#" class="hover:text-gray-900 dark:hover:text-white">
                                        <img class="h-[55px] aspect-square object-contain rounded-full border border-white hover:scale-110 transition-all"
                                            src="{{ asset('assets/icons/www.png') }}" alt="Facebook page" />
                                        <span class="sr-only">WWW</span>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                    <div class="flex justify-between">
                        <span class="text-sm sm:text-center dark:text-gray-400">
                            {{ $footer->copyright }}
                        </span>
                        <span class="text-sm sm:text-center dark:text-gray-400">Developed by Alphalib
                        </span>
                        @yield('HI')
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- End Footer -->


</body>

</html>
