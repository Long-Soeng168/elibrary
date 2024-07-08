@extends('layouts.client')

@section('content')
    @include('client.components.search')

    <!-- Detail -->
    <div class="max-w-screen-xl px-2 mx-auto mt-6 lg:px-0">
        <div class="min-[800px]:grid grid-cols-12 gap-4">
            <div class="flex flex-col items-center w-full col-span-5 px-2 mb-6 mr-2 lg:col-span-4 lg-px-0">
                <div class="flex flex-col w-full gap-2">
                    <a href="{{ asset('assets/images/news/'.$item->image) }}" class="glightbox">
                        <img class="bg-white  w-full aspect-[6/9] object-cover rounded-md cursor-pointer border"
                            src="{{ asset('assets/images/news/'.$item->image) }}" alt="Book Cover" />
                    </a>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach ($multi_images as $index => $image)
                                @if ($index < 3 || count($multi_images) == 4)
                                    <a href="{{ asset('assets/images/news/thumb/' . $image->image) }}" class="glightbox">
                                        <img class="bg-white w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border shadow-md"
                                            src="{{ asset('assets/images/news/thumb/' . $image->image) }}">
                                    </a>
                                @elseif ($index == 3)
                                    <a href="{{ asset('assets/images/news/' . $image->image) }}"
                                    class="glightbox relative w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out ">
                                        <div class="absolute flex items-center justify-center w-full h-full transition-all duration-300 border rounded-md shadow-md bg-gray-900/60 hover:bg-gray-900/20">
                                            <span class="text-xl font-medium text-white">
                                                +{{ count($multi_images) - 4 }}
                                            </span>
                                        </div>
                                        <img src="{{ asset('assets/images/news/thumb/' . $image->image) }}"
                                            class="bg-white rounded-lg w-full aspect-[1/1]">
                                    </a>
                                @else
                                    <a href="{{ asset('assets/images/news/' . $image->image) }}" class="glightbox">
                                        <img class="bg-white hidden w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border shadow-md"
                                            src="{{ asset('assets/images/news/thumb/' . $image->image) }}">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    <!-- Action Button -->
                    <div class="flex w-full gap-2 rounded-md shadow-sm" role="group">
                        <button type="button"
                            class="inline-flex items-center justify-center flex-1 gap-2 px-4 py-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                            onclick="openPdfPopup('{{ asset('assets/pdf/news/'.$item->pdf) }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-eye">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <div>
                                <p class="whitespace-nowrap">Read PDF</p>
                                <p class="text-center">(54345)</p>
                            </div>
                        </button>

                        <!-- Popup Container -->
                        <div class="popup-overlay" id="popupOverlay">
                            <div class="popup-content-container">
                                <div class="popup-content">
                                    <span class="close-btn" onclick="closePdfPopup()">
                                        <img src="{{ asset('assets/icons/cancel.png') }}" alt=""
                                            class="close-btn-image" />
                                    </span>
                                    <embed id="pdfEmbed" src="" width="100%" height="100%" />
                                </div>
                            </div>
                        </div>

                        <a href="{{ asset('assets/pdf/news/'.$item->pdf) }}" download
                            class="inline-flex items-center justify-center flex-1 gap-2 px-4 py-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-down-to-line">
                                <path d="M12 17V3" />
                                <path d="m6 11 6 6 6-6" />
                                <path d="M19 21H5" />
                            </svg>
                            <div>
                                <p class="whitespace-nowrap">Download PDF</p>
                                <p class="text-center">(9567)</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-span-7 lg:col-span-8">
                <div class="text-sm font-semibold tracking-wide uppercase text-primary">
                    Bulletin
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
                    <div class="no-tailwind">
                        {!! $item->description !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Detail -->

    <!-- Items -->
    <div class="max-w-screen-xl mx-auto mt-6">
        <div class="flex justify-between px-2 py-1 m-2 bg-primary xl:m-0">
            <p class="text-lg text-white">Related</p>
            <a
                class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                See More
                <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
            </a>
        </div>
        <!-- Card Grid -->
        <div
            class="grid grid-cols-2 gap-2 py-2 m-2 lg:py-4 sm:grid-cols-3 md:grid-cols-3 xl:grid-cols-6 sm:gap-2 md:gap-4 lg:gap-6 xl:m-0">
            <!-- Card -->
            @forelse ($related_items as $item)
                <a class="block group" href="{{ url('bulletins/'.$item->id) }}">
                    <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                        <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                            src="{{ asset('assets/images/news/thumb/'.$item->image) }}"
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