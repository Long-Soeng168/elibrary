@extends('layouts.client')

@section('content')
    {{-- Start Search --}}
    @include('client.components.search', [
        'actionUrl' => url('/audios'),
        'title' => 'Audios',
    ])
    {{-- End Search --}}

    <!-- Detail -->
    <div class="max-w-screen-xl mx-auto mt-6 lg:px-0">
        <div class="min-[1000px]:grid grid-cols-12 gap-4 px-2">
            <div class="flex flex-col items-center col-span-5 mb-6">
                <div class="flex flex-col w-full gap-2 ">
                    @if ($item->image)
                    <a href="{{ asset('assets/images/audios/'.$item->image) }}" class="glightbox">
                        <img class="w-full aspect-[16/9] object-cover rounded-md cursor-pointer border"
                            src="{{ asset('assets/images/audios/'.$item->image) }}" alt="Book Cover" />

                    </a>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach ($multi_images as $index => $image)
                                @if ($index < 3 || count($multi_images) == 4)
                                    <a href="{{ asset('assets/images/audios/' . $image->image) }}" class="glightbox">
                                        <img class="w-full aspect-[1/1] bg-white hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border shadow-md"
                                            src="{{ asset('assets/images/audios/thumb/' . $image->image) }}">
                                    </a>
                                @elseif ($index == 3)
                                    <a href="{{ asset('assets/images/audios/' . $image->image) }}"
                                    class="glightbox relative w-full aspect-[1/1] bg-white hover:scale-110 transition-transform duration-500 ease-in-out ">
                                        <div class="absolute flex items-center justify-center w-full h-full transition-all duration-300 border rounded-md shadow-md bg-gray-900/60 hover:bg-gray-900/20">
                                            <span class="text-xl font-medium text-white">
                                                +{{ count($multi_images) - 4 }}
                                            </span>
                                        </div>
                                        <img src="{{ asset('assets/images/audios/thumb/' . $image->image) }}"
                                            class="rounded-lg w-full aspect-[1/1] bg-white">
                                    </a>
                                @else
                                    <a href="{{ asset('assets/images/audios/' . $image->image) }}" class="glightbox">
                                        <img class="hidden w-full aspect-[1/1] bg-white hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border shadow-md"
                                            src="{{ asset('assets/images/audios/thumb/' . $image->image) }}">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @else
                    <a href="{{ asset('assets/icons/audio_placeholder.png') }}" class="glightbox">
                        <img class="w-full aspect-[16/9] object-contain p-10 rounded-md cursor-pointer border"
                        src="{{ asset('assets/icons/audio_placeholder.png') }}" alt="Book Cover" />
                    </a>

                    @endif
                    <!-- Audio -->
                    <div
                        class="audio-player bg-white shadow-lg border p-4 rounded-lg dark:bg-gray-700 dark:border-none w-full min-w-[400px]">
                        <audio controls class="w-full">
                            <source
                                src="{{ asset('assets/audios/'.$item->file) }}"
                                type="audio/mpeg" />
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <!-- End Audio -->
                </div>
            </div>
            <div class="col-span-7">
                <div class="text-sm font-semibold tracking-wide uppercase text-primary">
                    Audio
                </div>
                <h1 class="block mt-1 mb-2 text-2xl font-medium leading-tight text-gray-800 dark:text-gray-100">
                    {{ $item->name }}
                </h1>
                <div class="flex flex-col gap-2">
                    @if ($item->author?->name)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Author
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->author?->name }}
                            </p>
                        </div>
                    @endif
                    @if ($item->isbn)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                isbn
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->isbn }}
                            </p>
                        </div>
                    @endif
                    @if ($item->publisher?->name)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Publisher
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->publisher?->name }}
                            </p>
                        </div>
                    @endif
                    @if ($item->year)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Year
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->year }}
                            </p>
                        </div>
                    @endif
                    @if ($item->pages_count)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Pages
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->pages_count }}
                            </p>
                        </div>
                    @endif
                    @if ($item->type?->name)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Type
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->type?->name }}
                            </p>
                        </div>
                    @endif
                    @if ($item->language?->name)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Language
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->language?->name }}
                            </p>
                        </div>
                    @endif
                    @if ($item->location?->name)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Location
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $item->location?->name }}
                            </p>
                        </div>
                    @endif
                    @if ($item->keywords)
                        <div class="flex nowrap">
                            <p
                                class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                Keywords
                            </p>
                            <p class="space-x-1 space-y-1 text-sm text-gray-600 dark:text-gray-200">
                                @foreach (explode(',', $item->keywords) as $keyword)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 whitespace-nowrap capitalize">
                                        {{ $keyword }}
                                    </span>
                                @endforeach
                            </p>
                        </div>
                    @endif

                </div>

                @if ($item->description)
                <div class="mt-8 ">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Description
                    </h2>
                    <div class="no-tailwind dark:text-white">
                        {!! $item->description !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Detail -->

    <!-- Start Items -->
    <div class="max-w-screen-xl mx-auto mt-6">
        <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
            <p class="text-lg text-white">Related</p>
            <a
                href="{{ url('/audios') }}"
                class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                See More
                <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
            </a>
        </div>
        <!-- Card Grid -->
        <div
            class="grid grid-cols-2 gap-2 py-2 m-2 lg:py-4 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-6 xl:m-0">
            <!-- Card -->
            @forelse ($related_items as $item)
            <a class="block group" href="{{ url('audios/'.$item->id) }}">
                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                        src="{{ asset('assets/images/audios/thumb/'.$item->image) }}"
                        alt="Image Description" />
                </div>

                <div class="pt-2">
                    <h3 data-tooltip-target="tooltip-item-{{ $item->id }}" data-tooltip-placement="bottom"
                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                        <p class="line-clamp-1">{{ $item->name }}</p>
                    </h3>

                    <div id="tooltip-item-{{ $item->id }}" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        {{ $item->name }}
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </a>
        @empty
            <p>No Related Item...</p>
        @endforelse
        </div>
        <!-- End Card Grid -->
    </div>
    <!-- End Items -->
@endsection
