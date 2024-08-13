@extends('layouts.client')
@section('content')
    {{-- Start Search --}}
        @include('client.components.search', [
            'actionUrl' => url('/'.$menu_database_default->slug),
            'title' => $menu_database_default->name,
            'title_kh' => $menu_database_default->name_kh,
            ])
    {{-- End Search --}}



    {{-- Start General --}}
    @if (count($areas) > 0)
    <div class="max-w-screen-xl mx-auto mt-4">
        <div class="flex justify-between px-2 py-2 m-2 bg-primary xl:m-0">
            <p class="text-lg text-white">{{ $protectedArea->name }}</p>
            {{-- <a  href="{{ url('/publications') }}"
                class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                {{ __('messages.seeMore') }}
                <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
            </a> --}}
        </div>
        <!-- Card Grid -->
        <div
            class="mx-2 md:mx-0">
            <!-- Card -->
            @forelse ($areas as $item)
                    <div class="grid w-full my-4 border rounded-lg md:gap-4 md:grid-cols-12 ">
                        <a href="{{ url('/' . $item->slug) }}"
                            class="flex items-center justify-center w-full p-4 mx-auto rounded-md md:m-4 md:col-span-5 dark:bg-gray-800 group hover:bg-gray-200 dark:hover:bg-gray-600">
                            <h3
                                class="bg-gradient-to-r from-[#cd2226] to-[#3c3a84] font-semibold w-full p-4 rounded-md text-md text-white">
                                @if (app()->getLocale() == 'kh' && $item->name_kh)
                                    {{ $item->name_kh }}
                                @else
                                    {{ $item->name }}
                                @endif
                            </h3>
                        </a>
                        <div class="flex flex-col justify-center p-4 m-4 mt-0 border rounded-md shadow-md md:mt-4 md:col-span-7">
                            @if (count($item->pages) > 0)
                                @foreach ($item->pages as $page)
                                    <div class="flex items-center justify-between p-1 gap-2 {{ count($item->pages) > 1 ? 'mb-4 border-b' : '' }} ">
                                        <h3
                                            class="font-semibold text-gray-800 group-hover:text-gray-600 text-md lg:text-lg dark:text-gray-300 dark:group-hover:text-gray-50">
                                            {{ $page->name }}
                                        </h3>
                                        <div class="flex gap-3">
                                            @if ($page->image_url)
                                            <a href="{{ $page->image_url }}"><img class="object-contain h-5 transition-all duration-300 hover:scale-125 max-w-10" src="{{ asset('assets/icons/video.png') }}" alt=""></a>
                                            @endif

                                            @if ($page->video_url)
                                            <a href="{{ $page->video_url }}"><img class="object-contain h-5 transition-all duration-300 hover:scale-125 max-w-10" src="{{ asset('assets/icons/image.png') }}" alt=""></a>
                                            @endif

                                            @if ($page->description)
                                            <a href="{{ url('/page_description/'.$page->id) }}"><img class="object-contain h-5 transition-all duration-300 hover:scale-125 max-w-10" src="{{ asset('assets/icons/file.png') }}" alt=""></a>
                                            @endif



                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>


            @empty
            <p class="p-2">{{ __('messages.noData') }}...</p>
            @endforelse
        </div>
        <!-- End Card Grid -->
    </div>
    @endif

    {{-- End General --}}

    <!-- ====== Start Items ====== -->

        <!-- ===== End Items ===== -->
    @endsection
