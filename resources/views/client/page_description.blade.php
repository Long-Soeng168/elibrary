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
    <div class="max-w-screen-xl mx-auto mt-4">
        <div class="flex justify-between px-2 py-2 m-2 bg-primary xl:m-0">
            <p class="text-lg text-white">{{ $page->name }}</p>
            {{-- <a  href="{{ url('/publications') }}"
                class="flex items-center gap-2 text-lg text-white transition-all cursor-pointer hover:underline hover:translate-x-2">
                {{ __('messages.seeMore') }}
                <img src="{{ asset('assets/icons/right-arrow.png') }}" alt="" class="w-5 h-5" />
            </a> --}}
        </div>
        <!-- Card Grid -->
        <div class="mx-2 md:mx-0 no-tailwind">
            {!! $page->description !!}
        </div>
        <!-- End Card Grid -->
    </div>
@endsection
