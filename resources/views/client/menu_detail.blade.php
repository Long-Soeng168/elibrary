@extends('layouts.client')

@section('content')
    @include('client.components.search')
    <div class="max-w-screen-xl px-2 py-6 mx-auto min-h-[30vh]">
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-700 dark:text-gray-200 lg:mb-6 lg:text-4xlndark:text-white">
            {{ $item->name }}
        </h1>
        <div class="text-gray-600 dark:text-gray-300 no-tailwind">
            {{ $item->description }}
        </div>
    </div>
@endsection
