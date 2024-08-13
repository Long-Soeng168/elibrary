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
        <img src="{{ asset('assets/comming_soon.png') }}" class="w-full" alt="">
    </div>
@endsection
