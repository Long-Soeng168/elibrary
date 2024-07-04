@extends('layouts.client')

@section('content')
    @include('client.components.search')

    <!-- Detail -->
    <div class="max-w-screen-xl mx-auto mt-6 lg:px-0">
        <div class="min-[1000px]:flex">
            <div class="flex flex-col items-center mb-6">
                <div class="max-w-[500px] w-full lg:w-auto flex flex-col gap-2 px-2">
                    <a href="{{ asset('assets/images/images/'.$item->image) }}" class="overflow-hidden rounded-md glightbox">
                        <img class="max-w-[500px] h-auto object-cover  cursor-pointer "
                            src="{{ asset('assets/images/images/'.$item->image) }}" alt="Book Cover" />
                    </a>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach ($multi_images as $index => $image)
                                @if ($index < 3 || count($multi_images) == 4)
                                    <a href="{{ asset('assets/images/images/thumb/' . $image->image) }}" class="glightbox">
                                        <img class="w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border shadow-md"
                                            src="{{ asset('assets/images/images/thumb/' . $image->image) }}">
                                    </a>
                                @elseif ($index == 3)
                                    <a href="{{ asset('assets/images/images/thumb/' . $image->image) }}"
                                    class="glightbox relative w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out ">
                                        <div class="absolute flex items-center justify-center w-full h-full transition-all duration-300 border rounded-md shadow-md bg-gray-900/60 hover:bg-gray-900/20">
                                            <span class="text-xl font-medium text-white">
                                                +{{ count($multi_images) - 4 }}
                                            </span>
                                        </div>
                                        <img src="{{ asset('assets/images/images/thumb/' . $image->image) }}"
                                            class="rounded-lg w-full aspect-[1/1]">
                                    </a>
                                @else
                                    <a href="{{ asset('assets/images/images/thumb/' . $image->image) }}" class="glightbox">
                                        <img class="hidden w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border shadow-md"
                                            src="{{ asset('assets/images/images/thumb/' . $image->image) }}">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    {{-- <div class="flex w-full gap-2 rounded-md shadow-sm" role="group">
                        <a class="inline-flex items-center justify-center flex-1 gap-2 px-4 py-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-md glightbox hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                            onclick="openPdfPopup('/files/pdf_file.pdf')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-eye">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <div>
                                <p class="whitespace-nowrap">View Images</p>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="lg:ml-4">
                <div class="text-sm font-semibold tracking-wide uppercase text-primary">
                    Image
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

    <!-- Start Items -->
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
            class="grid grid-cols-2 gap-2 py-2 m-2 lg:py-4 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-6 xl:m-0">
            <!-- Card -->
            <a class="block group" href="#">
                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                        src="https://www.creativeparamita.com/wp-content/uploads/2022/03/the-mountain.jpg"
                        alt="Image Description" />
                </div>

                <div class="pt-2">
                    <h3 data-tooltip-target="tooltip-bottom1" data-tooltip-placement="bottom"
                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                        <p class="line-clamp-1">ចំណងជើងខ្មែរ</p>
                    </h3>

                    <div id="tooltip-bottom1" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        1 revamped and dynamic approach to yoga analytics A revamped and
                        dynamic approach to yoga analytics
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </a>

            <a class="block group" href="#">
                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                        src="https://www.creativeparamita.com/wp-content/uploads/2022/03/the-mountain.jpg"
                        alt="Image Description" />
                </div>

                <div class="pt-2">
                    <h3 data-tooltip-target="tooltip-bottom2" data-tooltip-placement="bottom"
                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                        <p class="line-clamp-1">
                            A revamped and dynamic approach to yoga analytics
                        </p>
                    </h3>

                    <div id="tooltip-bottom2" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        2 revamped and dynamic approach to yoga analytics A revamped and
                        dynamic approach to yoga analytics
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </a>

            <a class="block group" href="#">
                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                        src="https://www.creativeparamita.com/wp-content/uploads/2022/03/the-mountain.jpg"
                        alt="Image Description" />
                </div>

                <div class="pt-2">
                    <h3 data-tooltip-target="tooltip-bottom1" data-tooltip-placement="bottom"
                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                        <p class="line-clamp-1">ចំណងជើងខ្មែរ</p>
                    </h3>

                    <div id="tooltip-bottom1" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        1 revamped and dynamic approach to yoga analytics A revamped and
                        dynamic approach to yoga analytics
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </a>

            <a class="block group" href="#">
                <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                    <img class="w-full aspect-[16/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                        src="https://www.creativeparamita.com/wp-content/uploads/2022/03/the-mountain.jpg"
                        alt="Image Description" />
                </div>

                <div class="pt-2">
                    <h3 data-tooltip-target="tooltip-bottom2" data-tooltip-placement="bottom"
                        class="relative inline-block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                        <p class="line-clamp-1">
                            A revamped and dynamic approach to yoga analytics
                        </p>
                    </h3>

                    <div id="tooltip-bottom2" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        2 revamped and dynamic approach to yoga analytics A revamped and
                        dynamic approach to yoga analytics
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </a>
        </div>
        <!-- End Card Grid -->
    </div>
    <!-- End Items -->
@endsection
