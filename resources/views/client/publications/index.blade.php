@extends('layouts.client')
@section('content')
    <!-- Search -->
    <div class="p-2 bg-gradient-to-r from-primary dark:from-gray-600 to-transparent">
        <div class="max-w-screen-xl mx-auto">
            <form class="w-full" action="search_book.html">
                <div class="flex flex-wrap gap-2">
                    <!-- Search Database -->
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-tl-lg rounded-tr-lg md:rounded-s-lg text-md px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-gray-100 dark:focus:ring-gra2bg-gray-200 w-full md:w-auto justify-center md:rounded-tr-none border border-primary"
                        type="button">
                        E-Publications
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-30 hidden w-auto bg-white border divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                        <ul class="py-2 text-gray-700 text-md dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            @forelse ($menu_databases as $item)
                                <li>
                                    <a href="{{ url($item->slug) }}"
                                        class="block px-6 py-2 hover:bg-gray-100 {{ request()->is($item->slug) ? 'bg-gray-200 underline' : '' }} dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ $item->name }}
                                    </a>
                                </li>
                            @empty

                            @endforelse
                        </ul>
                    </div>
                    <!-- End Search Database -->

                    <!-- Filter -->
                    <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown"
                        class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-md px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-gray-100 dark:focus:ring-gray-bg-gray-200 w-full md:w-auto justify-center border border-primary"
                        type="button">
                        Filter
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="multi-dropdown"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-[250px] dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 border-none dark:text-gray-200"
                            aria-labelledby="multiLevelDropdownButton">
                            @forelse ($categories as $category)
                                @if (count($category->subCategories) < 1)
                                    <li>
                                        <a href="#"
                                            class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @else
                                <li>
                                    <div class="flex">
                                        <a href="#"
                                            class="flex-1 py-2 pl-6 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ $category->name }}
                                        </a>
                                        <button id="doubleDropdownButton-{{ $category->id }}" data-dropdown-toggle="doubleDropdown-{{ $category->id }}"
                                            data-dropdown-placement="bottom-start" type="button"
                                            class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-3 h-3 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="doubleDropdown-{{ $category->id }}"
                                        class="relative z-30 hidden bg-gray-100 divide-y divide-gray-200 border-t-4 border-t-primary/50  shadow-lg w-[250px] dark:bg-gray-500 ml-2 border">
                                        {{-- <div
                                            class="absolute z-[-1] w-6 h-6 bg-gray-100 dark:bg-gray-500 transform rotate-45 -top-1.5 left-3">
                                        </div> --}}
                                        <div class="py-1 font-bold text-center">{{ $category->name }}</div>
                                        <ul class="py-2 pl-6 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="doubleDropdownButton-{{ $category->id }}">
                                            @forelse ($category->subCategories as $subCategory)
                                                <li class="list-disc hover:underline">
                                                    <a href="#"
                                                        class="block py-2 pr-4 dark:hover:bg-gray-600 dark:hover:text-white">{{ $subCategory->name }}</a>
                                                </li>
                                            @empty

                                            @endforelse
                                        </ul>
                                    </div>
                                </li>
                                @endif
                            @empty

                            @endforelse


                        </ul>
                    </div>

                    <div class="flex flex-1">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 border-gray-50 border-1 border border-gray-300 focus:ring-primary focus:border-blue-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 rounded-bl-lg md:rounded-bl-none border border-primary"
                            placeholder="Search..." />
                        <button type="submit"
                            class="top-0 end-0 p-2.5 text-md font-medium h-full text-white bg-primary rounded-e-lg border border-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-primary dark:hover:bg-primary dark:focus:ring-primaryHover flex space-x-2 items-center justify-center ml-2 rounded-tr-none md:rounded-tr-lg">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Search -->

    <div class="max-w-screen-xl gap-4 px-2 mx-auto lg:flex xl:px-0">
        <!-- Database -->
        <div id="accordion-collapse" data-accordion="collapse" class="max-w-screen-xl mx-auto mt-6">
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-start w-auto gap-2 px-2 py-1 mb-2 bg-gray-200 dark:bg-gray-500"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="true"
                    aria-controls="accordion-collapse-body-2">
                    <p class="text-xl font-bold text-gray-700 uppercase dark:text-gray-100">
                        Database
                    </p>
                    <svg data-accordion-icon class="w-5 h-5 text-gray-700 rotate-180 shrink-0 dark:text-gray-200"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div>
                    <!-- Icon Blocks -->
                    <div class="">
                        <div class="grid items-center grid-cols-3 gap-4 sm:grid-cols-3 lg:grid-cols-1">
                            @forelse ($menu_databases as $index => $database)
                                <a class="{{ request()->is($database->slug) ? 'bg-gray-200' : '' }} flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600"
                                href="{{ url('/' . $database->slug) }}">
                                    <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                                        <img src="{{ asset('assets/images/databases/' . $database->client_side_image) }}" alt=""
                                            class="object-contain h-full" />
                                    </div>
                                    <div class="mt-1">
                                        <h3
                                            class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                            {{ $database->name }}
                                        </h3>
                                    </div>
                                </a>

                            @empty
                            <p class="py-4">No Data...</p>
                            @endforelse


                        </div>
                    </div>
                    <!-- End Icon Blocks -->
                </div>
            </div>
        </div>
        <!-- End Database -->

        <!-- Items -->
        <div>
            <div class="max-w-screen-xl mx-auto mt-6">
                <div class="flex justify-between px-2 py-1 bg-primary">
                    <p class="text-lg text-white capitalize">
                        E-Publications
                    </p>
                </div>
                <div
                    class="grid grid-cols-2 gap-2 py-2 lg:py-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 sm:gap-2 md:gap-4 lg:gap-6">
                    <!-- Card -->
                    @forelse ($items as $item)
                        <a class="block group" href="{{ url('publications/'.$item->id) }}">
                            <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                                <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                    src="{{ asset('assets/images/publications/thumb/'.$item->image) }}"
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
            <!-- Pagination -->
            {{ $items->links() }}
            <!-- End Pagination -->
        </div>
    </div>
@endsection
