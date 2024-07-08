@extends('layouts.client')
@section('content')
    {{-- Start Search --}}
    @include('client.components.search')
    {{-- End Search --}}

    <!-- Slide Show -->
    <div class="max-w-screen-xl p-2 mx-auto">
        <swiper-container autoplay="true" autoplay-delay="2000" speed="1000" effect="slide" class="mySwiper" pagination="true"
            pagination-clickable="true" space-between="30" loop="true">
            @forelse ($slides as $slide)
                <swiper-slide class="swiper-slide-item">
                    <a href="{{ asset('assets/images/slides/' . $slide->image) }}" class="w-full glightbox">
                        <img class="object-cover w-full swiper-slide-img"
                            src="{{ asset('assets/images/slides/' . $slide->image) }}" alt="" /></a>
                </swiper-slide>
            @empty
            @endforelse
        </swiper-container>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    </div>
    <!-- End Slide Show -->

    <!-- Start Database -->
    <div class="max-w-screen-xl px-2 mx-auto mt-6">
        <p class="text-2xl font-bold text-gray-700 uppercase dark:text-white xl:p-0">
            Databases
        </p>
        <!-- Icon Blocks -->
        <div class="">
            <div>
                <swiper-container class="w-full swiper-responsive" effect="slide" pagination="true" {{-- space-between="30" --}}
                    {{-- loop="true" --}} init="false">
                    @forelse ($menu_databases as $index => $database)
                        <swiper-slide class="flex items-center justify-center object-contain rounded-xl">
                            <a href="{{ url('/' . $database->slug) }}"
                                class="flex flex-col items-center justify-center w-full p-4 py-6 {{ request()->is($database->slug . '*') ? 'bg-gray-100' : '' }} dark:bg-gray-700 group hover:bg-gray-200 rounded-xl dark:hover:bg-gray-600">
                                <img class="object-contain h-20 aspect-square swiper-responsive-img"
                                    src="{{ asset('assets/images/databases/' . $database->client_side_image) }}"
                                    alt="">
                                <h3
                                    class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                    {{ $database->name }}
                                </h3>
                            </a>
                        </swiper-slide>
                    @empty
                    <p class="py-4">No Data...</p>
                    @endforelse
                </swiper-container>


                <script>
                    const swiperEl = document.querySelector('.swiper-responsive')
                    Object.assign(swiperEl, {
                        slidesPerView: 3,
                        spaceBetween: 10,
                        breakpoints: {
                            640: {
                                slidesPerView: 3,
                                spaceBetween: 10,
                            },
                            768: {
                                slidesPerView: 4,
                                spaceBetween: 20,
                            },
                            1024: {
                                // slidesPerView: 7,
                                slidesPerView: {{ count($menu_databases) }},
                                spaceBetween: 20,
                            },
                        },
                    });
                    swiperEl.initialize();

                </script>
            </div>

        </div>
        <!-- End Icon Blocks -->
    </div>
    <!-- End Database -->

    <!-- ====== Start Items ====== -->

    @forelse ($menu_databases as $database)
        @switch($database->slug)
            @case('publications')
                {{-- E-Publications --}}
                <div class="max-w-screen-xl mx-auto mt-6">
                    <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
                        <p class="text-lg text-white">E-Publications</p>
                        <a
                            class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                            See More
                            <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
                        </a>
                    </div>
                    <!-- Card Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
                        <!-- Card -->
                        @forelse ($publications as $item)
                            <a class="block group" href="{{ url('/publications/' . $item->id) }}">
                                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                    <img class="w-full border aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                        src="{{ asset('assets/images/publications/thumb/' . $item->image) }}"
                                        alt="Image Description" />
                                </div>

                                <div class="pt-2">
                                    <h3 data-tooltip-target="tooltip-publication-{{ $item->id }}"
                                        data-tooltip-placement="bottom"
                                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                                        <p class="line-clamp-1">{{ $item->name }}</p>
                                    </h3>

                                    <div id="tooltip-publication-{{ $item->id }}" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ $item->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                    <!-- End Card Grid -->
                </div>
            @break

            @case('videos')
                {{-- Videos --}}
                <div class="max-w-screen-xl mx-auto mt-6">
                    <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
                        <p class="text-lg text-white">Videos</p>
                        <a
                            class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                            See More
                            <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
                        </a>
                    </div>
                    <!-- Card Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
                        <!-- Card -->
                        @forelse ($videos as $item)
                            <a class="block group" href="{{ url('/videos/' . $item->id) }}">
                                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border"
                                        src="{{ asset('assets/images/videos/thumb/' . $item->image) }}" alt="Image Description" />
                                </div>

                                <div class="pt-2">
                                    <h3 data-tooltip-target="tooltip-video-{{ $item->id }}" data-tooltip-placement="bottom"
                                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                                        <p class="line-clamp-1">{{ $item->name }}</p>
                                    </h3>

                                    <div id="tooltip-video-{{ $item->id }}" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ $item->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse

                    </div>
                    <!-- End Card Grid -->
                </div>
            @break

            @case('images')
                {{-- Images --}}
                <div class="max-w-screen-xl mx-auto mt-6">
                    <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
                        <p class="text-lg text-white">Images</p>
                        <a
                            class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                            See More
                            <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
                        </a>
                    </div>
                    <!-- Card Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
                        <!-- Card -->
                        @forelse ($images as $item)
                            <a class="block group" href="{{ url('/images/' . $item->id) }}">
                                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border"
                                        src="{{ asset('assets/images/images/thumb/' . $item->image) }}" alt="Image Description" />
                                </div>

                                <div class="pt-2">
                                    <h3 data-tooltip-target="tooltip-image-{{ $item->id }}" data-tooltip-placement="bottom"
                                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                                        <p class="line-clamp-1">{{ $item->name }}</p>
                                    </h3>

                                    <div id="tooltip-image-{{ $item->id }}" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ $item->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse

                    </div>
                    <!-- End Card Grid -->
                </div>
            @break

            @case('audios')
                {{-- Audios --}}
                <div class="max-w-screen-xl mx-auto mt-6">
                    <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
                        <p class="text-lg text-white">Audios</p>
                        <a
                            class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                            See More
                            <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
                        </a>
                    </div>
                    <!-- Card Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
                        <!-- Card -->
                        @forelse ($audios as $item)
                            <a class="block group" href="{{ url('/audios/' . $item->id) }}">
                                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border"
                                        src="{{ asset('assets/images/audios/thumb/' . $item->image) }}" alt="Image Description" />
                                </div>

                                <div class="pt-2">
                                    <h3 data-tooltip-target="tooltip-audio-{{ $item->id }}" data-tooltip-placement="bottom"
                                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                                        <p class="line-clamp-1">{{ $item->name }}</p>
                                    </h3>

                                    <div id="tooltip-audio-{{ $item->id }}" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ $item->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse

                    </div>
                    <!-- End Card Grid -->
                </div>
            @break

            @case('bulletins')
                {{-- Start Bulletins --}}
                <div class="max-w-screen-xl mx-auto mt-6">
                    <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
                        <p class="text-lg text-white">Bulletins</p>
                        <a
                            class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                            See More
                            <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
                        </a>
                    </div>
                    <!-- Card Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
                        <!-- Card -->
                        @forelse ($bulletins as $item)
                            <a class="block group" href="{{ url('/bulletins/' . $item->id) }}">
                                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                    <img class="w-full border aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                        src="{{ asset('assets/images/news/thumb/' . $item->image) }}" alt="Image Description" />
                                </div>

                                <div class="pt-2">
                                    <h3 data-tooltip-target="tooltip-publication-{{ $item->id }}"
                                        data-tooltip-placement="bottom"
                                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                                        <p class="line-clamp-1">{{ $item->name }}</p>
                                    </h3>

                                    <div id="tooltip-publication-{{ $item->id }}" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ $item->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                    <!-- End Card Grid -->
                </div>
                {{-- End Bulletins --}}
            @break

            @case('theses')
                {{-- Start Theses --}}
                <div class="max-w-screen-xl mx-auto mt-6">
                    <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
                        <p class="text-lg text-white">Theses</p>
                        <a
                            class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                            See More
                            <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
                        </a>
                    </div>
                    <!-- Card Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
                        <!-- Card -->
                        @forelse ($theses as $item)
                            <a class="block group" href="{{ url('/theses/' . $item->id) }}">
                                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                    <img class="w-full border aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                        src="{{ asset('assets/images/theses/thumb/' . $item->image) }}" alt="Image Description" />
                                </div>

                                <div class="pt-2">
                                    <h3 data-tooltip-target="tooltip-thesis-{{ $item->id }}" data-tooltip-placement="bottom"
                                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                                        <p class="line-clamp-1">{{ $item->name }}</p>
                                    </h3>

                                    <div id="tooltip-thesis-{{ $item->id }}" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ $item->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                    <!-- End Card Grid -->
                </div>
                {{-- End Theses --}}
            @break

            @case('journals')
                {{-- Start Journal --}}
                <div class="max-w-screen-xl mx-auto mt-6">
                    <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
                        <p class="text-lg text-white">Journals</p>
                        <a
                            class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                            See More
                            <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
                        </a>
                    </div>
                    <!-- Card Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
                        <!-- Card -->
                        @forelse ($journals as $item)
                            <a class="block group" href="{{ url('/journals/' . $item->id) }}">
                                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                    <img class="w-full border aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                        src="{{ asset('assets/images/journals/thumb/' . $item->image) }}"
                                        alt="Image Description" />
                                </div>

                                <div class="pt-2">
                                    <h3 data-tooltip-target="tooltip-journal-{{ $item->id }}" data-tooltip-placement="bottom"
                                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                                        <p class="line-clamp-1">{{ $item->name }}</p>
                                    </h3>

                                    <div id="tooltip-journal-{{ $item->id }}" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ $item->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                    <!-- End Card Grid -->
                </div>
                {{-- End Journal --}}
            @break
        @endswitch
        @empty
            <p class="max-w-screen-xl py-6 mx-auto">No Data...</p>
        @endforelse

        <!-- ===== End Items ===== -->
    @endsection
