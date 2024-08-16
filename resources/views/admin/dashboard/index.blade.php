@extends('admin.layouts.admin')
@section('content')
    <div>
        <div class="grid grid-cols-1 gap-4 mx-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-6">
            {{-- <div class="w-full p-4 m-auto rounded-lg sm:col-span-1 md:col-span-2 lg:col-span-2">
                <canvas id="chartPie"></canvas>
            </div> --}}
            <div class="w-full p-4 m-auto rounded-lg sm:col-span-1 md:col-span-2 lg:col-span-4">
                <canvas id="chartBar"></canvas>
            </div>
        </div>

        <div class="p-4">

            <div class="grid items-center grid-cols-3 gap-4 sm:grid-cols-3 lg:grid-cols-{{ count($menu_databases) }}">
                @forelse ($menu_databases as $database)
                    @if ($database->type !== 'slug')
                        @continue
                    @endif
                    @switch($database->slug)
                        @case('publications')
                            @can('view epublication')
                                <a href="{{ url('admin/publications') }}"
                                    class="{{ request()->is('admin/publications*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Publications</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['publications'] }}
                                    </p>
                                </a>
                            @endcan
                        @break

                        @case('videos')
                            @can('view video')
                                <a href="{{ url('admin/videos') }}"
                                    class="{{ request()->is('admin/videos*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Videos</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['videos'] }}</p>
                                </a>
                            @endcan
                        @break

                        @case('images')
                            @can('view image')
                                <a href="{{ url('admin/images') }}"
                                    class="{{ request()->is('admin/images*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Images</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['images'] }}</p>
                                </a>
                            @endcan
                        @break

                        @case('audios')
                            @can('view audio')
                                <a href="{{ url('admin/audios') }}"
                                    class="{{ request()->is('admin/audios*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Audios</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['audios'] }}</p>
                                </a>
                            @endcan
                        @break

                        @case('bulletins')
                            @can('view bulletin')
                                <a href="{{ url('admin/bulletins') }}"
                                    class="{{ request()->is('admin/bulletins*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Bulletins</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['bulletins'] }}
                                    </p>
                                </a>
                            @endcan
                        @break

                        @case('theses')
                            @can('view thesis')
                                <a href="{{ url('admin/theses') }}"
                                    class="{{ request()->is('admin/theses*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Theses</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['theses'] }}</p>
                                </a>
                            @endcan
                        @break

                        @case('journals')
                            @can('view journal')
                                <a href="{{ url('admin/journals') }}"
                                    class="{{ request()->is('admin/journals*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Journals</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['journals'] }}
                                    </p>
                                </a>
                            @endcan
                        @break

                        @case('articles')
                            @can('view article')
                                <a href="{{ url('admin/articles') }}"
                                    class="{{ request()->is('admin/articles*') ? 'bg-slate-200 dark:bg-slate-500' : '' }} flex flex-col items-center justify-center p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                    <img src="{{ asset('assets/images/databases/' . $database->image) }}" alt="icon"
                                        class="object-contain h-20 aspect-square p-0.5 bg-white dark:bg-gray-200 rounded">
                                    <div class="text-sm text-gray-900 dark:text-white">Articles</div>
                                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $totalCountEachArchive['articles'] }}
                                    </p>
                                </a>
                            @endcan
                        @break
                    @endswitch
                    @empty
                    @endforelse

                </div>
            </div>
            {{-- <div class="grid items-center grid-cols-3 gap-4 sm:grid-cols-3 lg:grid-cols-5">
            <a href="{{ url('/admin/publications') }}" class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600">
                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                    <img src="{{ asset('assets/icons/epublication.png') }}" alt="" class="object-contain h-full">
                </div>
                <div class="mt-1">
                    <h3 class="font-semibold text-gray-800 group-hover:text-gray-600 text-md whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                        E-Publications
                    </h3>
                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $publicationsCount }}</p>
                </div>
            </a>
            <a href="{{ url('/admin/videos') }}" class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600">
                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                    <img src="{{ asset('assets/icons/video.png') }}" alt="" class="object-contain h-full">
                </div>
                <div class="mt-1">
                    <h3 class="font-semibold text-gray-800 group-hover:text-gray-600 text-md whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                        Videos
                    </h3>
                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $videosCount }}</p>
                </div>
            </a>
            <a href="{{ url('admin/images') }}" class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600">
                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                    <img src="{{ asset('assets/icons/image.png') }}" alt="" class="object-contain h-full">
                </div>
                <div class="mt-1">
                    <h3 class="font-semibold text-gray-800 group-hover:text-gray-600 text-md whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                        Image
                    </h3>
                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $imagesCount }}</p>
                </div>
            </a>
            <a href="{{ url('admin/audios') }}" class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600">
                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                    <img src="{{ asset('assets/icons/audio.png') }}" alt="" class="object-contain h-full">
                </div>
                <div class="mt-1">
                    <h3 class="font-semibold text-gray-800 group-hover:text-gray-600 text-md whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                        Audios
                    </h3>
                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $audiosCount }}</p>
                </div>
            </a>
            <a href="{{ url('admin/bulletins') }}" class="flex flex-col items-center justify-center p-4 group hover:bg-gray-100 rounded-xl dark:hover:bg-gray-600">
                <div class="flex items-center justify-center object-contain h-20 aspect-square rounded-xl">
                    <img src="{{ asset('assets/icons/bulletin.png') }}" alt="" class="object-contain h-full">
                </div>
                <div class="mt-1">
                    <h3 class="font-semibold text-gray-800 group-hover:text-gray-600 text-md whitespace-nowrap dark:text-gray-300 dark:group-hover:text-gray-50">
                        Bulletin / News
                    </h3>
                    <p class="text-center text-gray-700 dark:text-gray-200">{{ $bulletinsCount }}</p>
                </div>
            </a>
        </div> --}}
        </div>
        </div>


        <script src="{{ asset('assets/js/chartjs.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('chartBar').getContext('2d');
                var chartBar = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($label),
                        datasets: [{
                            label: "Archive Records",
                            data: @json($data),
                            backgroundColor: [
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // var ctx = document.getElementById('chartPie').getContext('2d');
                // var chartPie = new Chart(ctx, {
                //     type: 'pie',
                //     data: {
                //         labels: ['Users', 'Authors', 'Publishers'],
                //         datasets: [{
                //             label: "Records",
                //             data: [
                //                 {{ $totalCountEachArchive['users'] }},
                //                 {{ $totalCountEachArchive['authors'] }},
                //                 {{ $totalCountEachArchive['publishers'] }},

                //             ],
                //             backgroundColor: [
                //                 'rgba(255, 99, 132, 0.2)',
                //                 'rgba(54, 162, 235, 0.2)',
                //                 'rgba(255, 206, 86, 0.2)',
                //             ],
                //             borderColor: [
                //                 'rgba(255, 99, 132, 1)',
                //                 'rgba(54, 162, 235, 1)',
                //                 'rgba(255, 206, 86, 1)',
                //             ],
                //             borderWidth: 1
                //         }]
                //     },
                //     options: {
                //         scales: {
                //             y: {
                //                 beginAtZero: true
                //             }
                //         }
                //     }
                // });
            });
        </script>

    @endsection
