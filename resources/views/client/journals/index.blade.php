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
                        class="z-30 hidden w-auto bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                        <ul class="py-2 text-gray-700 text-md dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</a>
                            </li>
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
                            <li>
                                <a href="#"
                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <div class="flex">
                                    <a href="#"
                                        class="flex-1 py-2 pl-6 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dropdown
                                        Double</a>
                                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                        data-dropdown-placement="bottom-start" type="button"
                                        class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg class="w-3 h-3 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                    </button>
                                </div>
                                <div id="doubleDropdown"
                                    class="relative z-30 hidden bg-gray-100 divide-y divide-gray-200 rounded-lg shadow w-[250px] dark:bg-gray-500 ml-2">
                                    <div
                                        class="absolute z-[-1] w-6 h-6 bg-gray-100 dark:bg-gray-500 transform rotate-45 -top-1.5 left-3">
                                    </div>
                                    <ul class="py-2 text-sm text-gray-700 border-none dark:text-gray-200"
                                        aria-labelledby="doubleDropdownButton">
                                        <li>
                                            <a href="#"
                                                class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Overview</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My
                                                downloads</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Billing</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rewards</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-1">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 border-gray-50 border-1 border border-gray-300 focus:ring-primary focus:border-blue-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 rounded-bl-lg md:rounded-bl-none border border-primary"
                            placeholder="Search Mockups, Logos, Design Templates..." />
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
                            <a class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600"
                                href="#">
                                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                                    <img src="{{ asset('assets/icons/catalog.png') }}" alt=""
                                        class="object-contain h-full" />
                                </div>
                                <div class="mt-1">
                                    <h3
                                        class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                        E-Books
                                    </h3>
                                </div>
                            </a>
                            <a class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600"
                                href="#">
                                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                                    <img src="{{ asset('assets/icons/epublication.png') }}" alt=""
                                        class="object-contain h-full" />
                                </div>
                                <div class="mt-1">
                                    <h3
                                        class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                        E-Publications
                                    </h3>
                                </div>
                            </a>
                            <a class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600"
                                href="#">
                                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                                    <img src="{{ asset('assets/icons/video.png') }}" alt=""
                                        class="object-contain h-full" />
                                </div>
                                <div class="mt-1">
                                    <h3
                                        class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                        Videos
                                    </h3>
                                </div>
                            </a>

                            <a class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600"
                                href="#">
                                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                                    <img src="{{ asset('assets/icons/image.png') }}" alt=""
                                        class="object-contain h-full" />
                                </div>
                                <div class="mt-1">
                                    <h3
                                        class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                        Image
                                    </h3>
                                </div>
                            </a>
                            <a class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600"
                                href="#">
                                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                                    <img src="{{ asset('assets/icons/audio.png') }}" alt=""
                                        class="object-contain h-full" />
                                </div>
                                <div class="mt-1">
                                    <h3
                                        class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                        Audio
                                    </h3>
                                </div>
                            </a>
                            <a class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600"
                                href="#">
                                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                                    <img src="{{ asset('assets/icons/bulletin.png') }}" alt=""
                                        class="object-contain h-full" />
                                </div>
                                <div class="mt-1">
                                    <h3
                                        class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                                        Bulletin
                                    </h3>
                                </div>
                            </a>
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
                    <p class="text-lg text-white">E-Books</p>
                </div>
                <!-- Card Grid -->
                <div
                    class="grid grid-cols-2 gap-2 py-2 lg:py-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 sm:gap-2 md:gap-4 lg:gap-6">
                    <!-- Card -->
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                1 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                2 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                1 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                2 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                1 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                2 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                1 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                2 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                1 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                2 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                1 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                    <a class="block group" href="view-detail.html">
                        <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                            <img class="w-full aspect-[6/9] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
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
                                2 revamped and dynamic approach to yoga analytics A revamped
                                and dynamic approach to yoga analytics
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Card Grid -->
            </div>
            <!-- End Items -->
            <!-- Pagination -->
            <div class="max-w-screen-xl mx-auto mt-6">
                <nav role="navigation" aria-label="Pagination Navigation"
                    class="flex items-center justify-between m-2 xl:m-0">
                    <div class="flex justify-between flex-1 sm:hidden">
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-md cursor-default">
                            « Previous
                        </span>

                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                            Next »
                        </a>
                    </div>

                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm leading-5 text-gray-700">
                                Showing
                                <span class="font-medium">1</span>
                                to
                                <span class="font-medium">8</span>
                                of
                                <span class="font-medium">11</span>
                                results
                            </p>
                        </div>

                        <div>
                            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md"
                                        aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>

                                <span aria-current="page">
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 cursor-default">1</span>
                                </span>
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700"
                                    aria-label="Go to page 2">
                                    2
                                </a>

                                <a href="#" rel="next"
                                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500"
                                    aria-label="Next &amp;raquo;">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- End Pagination -->
        </div>
    </div>
@endsection
