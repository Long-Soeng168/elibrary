@extends('layouts.client')

@section('content')
    @include('client.components.search')

    <!-- Detail -->
    <div class="max-w-screen-xl px-2 mx-auto mt-6 lg:px-0">
        <div class="min-[1000px]:flex">
            <div class="flex flex-col items-center mb-6">
                <div class="max-w-[500px] w-full lg:w-auto flex flex-col gap-2 px-2 lg:px-0">
                    <a href="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" class="glightbox">
                        <img class="max-w-[500px] h-auto object-cover rounded-md cursor-pointer"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="Book Cover" />
                    </a>
                    <div class="grid grid-cols-4 gap-2">
                        <a href="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" class="glightbox">
                            <img class="w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" />
                        </a>
                        <img class="w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" />
                        <img class="w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" />
                        <div
                            class="relative w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out">
                            <button
                                class="absolute flex items-center justify-center w-full h-full transition-all duration-300 rounded-lg bg-gray-900/60 hover:bg-gray-900/20">
                                <span class="text-xl font-medium text-white">+7</span>
                                <div id="download-image" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Download image
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </button>
                            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                                class="rounded-lg w-full aspect-[1/1]" />
                        </div>
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
                    Your subtitle or any other text goes here Implementation of Title,
                    Subtitle and Author name as well as any other text you like to the
                    book cover design.
                </h1>
                <div class="flex flex-col gap-2">
                    <div class="flex nowrap">
                        <p
                            class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                            Author
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-200">
                            Long Soeng Co.
                        </p>
                    </div>
                    <div class="flex nowrap">
                        <p
                            class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                            Publisher
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-200">Routledge</p>
                    </div>
                    <div class="flex nowrap">
                        <p
                            class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                            Year
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-200">1988</p>
                    </div>
                    <div class="flex nowrap">
                        <p
                            class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                            Page Count
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-200">322</p>
                    </div>
                    <div class="flex nowrap">
                        <p
                            class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                            Type
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-200">
                            សៀវភៅ / Book
                        </p>
                    </div>
                    <div class="flex nowrap">
                        <p
                            class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                            Language
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-200">English</p>
                    </div>
                    <div class="flex nowrap">
                        <p
                            class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                            Location
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-200">
                            London, England
                        </p>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Description
                    </h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Upgrade to paperback for just
                        <span class="font-bold">$100</span> extra. Get matching spine and
                        back cover for your book.
                        <a href="#" class="underline text-primary">Contact me</a> for
                        upgrading or drop in a line when you place the order.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Purchase will include hi resolution
                        <span class="font-bold">eBook cover design</span> ready to upload
                        to Amazon Kindle, B&N Nook books and Smashwords.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Implementation of Title, Subtitle and Author name as well as any
                        other text you like to the
                        <span class="font-bold">book cover design</span>.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Exclusive
                        <a href="#" class="underline text-primary">premade book covers</a>, designed using only
                        Standard license royalty-free stock photos.
                        Copyrights to the design transferred to client for all purchases.
                    </p>
                </div>
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
