<div>
    @if (session('success'))
        <div class="fixed top-[5rem] right-4 z-[999999] " wire:key="{{ rand() }}" x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 7000)">
            <div x-show="show" id="alert-2"
                class="flex items-center p-4 mb-4 text-green-800 border border-green-500 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ml-2">
                    {{ session('success') }}
                </div>
                <button type="button" @click="show = false"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        {{-- @dd(session()->has('error')) --}}
        <div class="fixed top-[5rem] right-4 z-[999999] " wire:key="{{ rand() }}" x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 7000)">
            <div x-show="show" id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 border border-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ml-2">
                    @foreach (session('error') as $error)
                        <div class="text-sm font-medium ms-3">
                            - {{ $error }}
                        </div>
                    @endforeach

                    {{ session()->forget('errors') }}



                </div>
                <button type="button" @click="show = false"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <form class="w-full" action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-5 mb-5 lg:grid-cols-1">
            <!-- Start Name -->
            <div>
                <x-input-label for="name" :value="__('Title')" /><span class="text-red-500">*</span>
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" wire:model='name'
                    required autofocus placeholder="Title" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- End Name -->

            <div>
                <x-input-label for="short_description" :value="__('Abstract')" />
                <textarea wire:model='short_description' id="short_description" name="short_description"
                    class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    rows="2" placeholder="Type Short Description..." ></textarea>
            </div>

        </div>
        <div class="grid gap-5 mb-5 lg:grid-cols-2 lg:gap-6">
            <!-- Start Pages -->
            <div>
                <x-input-label for="pages_count" :value="__('Pages')" />
                <x-text-input id="pages_count" class="block w-full" type="number" name="pages_count"
                    wire:model='pages_count' autofocus placeholder="Number of Pages" />
                <x-input-error :messages="$errors->get('pages_count')" class="mt-2" />
            </div>
            <!-- End Pages -->


            <!-- Start Edition -->
            <div>
                <x-input-label for="barcode" :value="__('Barcode')" />
                <x-text-input id="barcode" class="block w-full" type="number" name="barcode" wire:model='barcode'
                    autofocus placeholder="Barcode" />
                <x-input-error :messages="$errors->get('barcode')" class="mt-2" />
            </div>
            <!-- End Edition -->

            <!-- Start isbn -->
            <div>
                <x-input-label for="isbn" :value="__('ISBN')" />
                <x-text-input id="isbn" class="block w-full" type="text" name="isbn" wire:model='isbn'
                    placeholder="ISBN" />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>
            <!-- End isbn -->

            <!-- Start inventory_number -->
            <div>
                <x-input-label for="inventory_number" :value="__('Inventory Number')" />
                <x-text-input id="inventory_number" class="block w-full" type="text" name="inventory_number"
                    wire:model='inventory_number' placeholder="Inventory Number" />
                <x-input-error :messages="$errors->get('inventory_number')" class="mt-2" />
            </div>
            <!-- End inventory_number -->

            <div>
                <x-input-label for="volume" :value="__('Volume')" />
                <x-text-input id="volume" class="block w-full" type="number" name="volume" wire:model='volume'
                    autofocus placeholder="Volume" />
                <x-input-error :messages="$errors->get('volume')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="issue" :value="__('Issue')" />
                <x-text-input id="issue" class="block w-full" type="number" name="issue" wire:model='issue'
                    autofocus placeholder="Issue" />
                <x-input-error :messages="$errors->get('issue')" class="mt-2" />
            </div>

            <!-- Start published_date -->
            <div>
                <x-input-label for="published_date" :value="__('Published Date')" />
                <x-text-input id="published_date" class="block w-full" type="date" name="published_date"
                    wire:model='published_date' placeholder="Published Date" />
                <x-input-error :messages="$errors->get('published_date')" class="mt-2" />
            </div>
            <!-- End published_date -->

            {{-- Start Publisher Select --}}
            <div class="relative w-full group">
                <x-input-label for="publisher" :value="__('Publisher')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <div class="flex justify-start flex-1">
                        <x-select-option wire:model.live='publisher_id' id="publisher" name="publisher_id"
                            class="publisher-select">
                            <option wire:key='publisher' value="0">Select Publisher...</option>
                            @forelse ($publishers as $publisher)
                                <option wire:key='{{ $publisher->id }}' value="{{ $publisher->id }}">
                                    {{ $publisher->name }}</option>
                            @empty
                                <option wire:key='nopublisher' value="0"> --No Publisher--</option>
                            @endforelse
                        </x-select-option>
                    </div>
                    <button type="button" data-modal-target="publisher_modal" data-modal-toggle="publisher_modal"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add
                    </button>

                    <!-- Start Publisher modal -->
                    <div id="publisher_modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create Publisher
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="publisher_modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 lg:p-5">
                                    <div class="grid grid-cols-2 gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newPublisherName'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Name">
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <label for="publisher"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                            <select id="publisher" wire:model='newPublisherGender'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="0">Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="n/a">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button data-modal-target="publisher_modal"
                                            data-modal-toggle="publisher_modal" type="button"
                                            wire:click='saveNewPublisher' wire:target="saveNewPublisher"
                                            wire:loading.attr="disabled"
                                            class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Publisher modal -->
                </div>
                <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
            </div>
            {{-- End Publisher Select --}}
        </div>


        <div class="grid lg:grid-cols-2 lg:gap-6">

            {{-- Start DOI --}}
            <div>
                <x-input-label for="doi" :value="__('DOI (Digital Object Identifier)')" />
                <x-text-input id="doi" class="block w-full" type="text" name="doi" wire:model='doi'
                autofocus placeholder="DOI" />
                <x-input-error :messages="$errors->get('doi')" class="mt-2" />
            </div>
            {{-- End DOI --}}

            {{-- Start Author Select --}}
            <div class="relative w-full mb-5 group">
                <x-input-label for="author" :value="__('Author')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <div class="flex justify-start flex-1">
                        <x-select-option class="author-select" wire:model.live='author_id' id="author"
                            name="author_id">
                            <option wire:key='author' value="0">Select Author...</option>
                            @forelse ($authors as $author)
                                <option wire:key='{{ $author->id }}' value="{{ $author->id }}">
                                    {{ $author->name }}
                                </option>
                            @empty
                                <option wire:key='noauthor' value="0"> --No Author--</option>
                            @endforelse
                        </x-select-option>
                    </div>
                    <button type="button" data-modal-target="author_modal" data-modal-toggle="author_modal"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add
                    </button>

                    <!-- Start Author modal -->
                    <div id="author_modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create Author
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="author_modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 lg:p-5">
                                    <div class="grid grid-cols-2 gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newAuthorName'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Name">
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <label for="author"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                            <select id="author" wire:model='newAuthorGender'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="0">Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="n/a">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button data-modal-target="author_modal" data-modal-toggle="author_modal"
                                            type="button" wire:click='saveNewAuthor' wire:target="saveNewAuthor"
                                            wire:loading.attr="disabled"
                                            class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Author modal -->
                </div>
                <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
            </div>
            {{-- End Author Select --}}

        </div>

        <div class="grid lg:grid-cols-2 lg:gap-6">

            {{-- Start Type Select --}}
            <div class="relative w-full mb-5 group">
                <x-input-label for="types" :value="__('Types')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <div class="flex justify-start flex-1">
                        <x-select-option wire:model.live='journal_type_id' id="types"
                            name="publication_type_id" class="type-select">
                            <option wire:key='type' value="0">Select Type...</option>
                            @forelse ($types as $type)
                                <option wire:key='{{ $type->id }}' value="{{ $type->id }}">
                                    {{ $type->name }}</option>
                            @empty
                                <option wire:key='notype' value="0">--No Type--</option>
                            @endforelse
                        </x-select-option>
                    </div>

                    <button type="button" data-modal-target="publication_type_modal"
                        data-modal-toggle="publication_type_modal"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add
                    </button>

                    <!-- Start Type modal -->
                    <div id="publication_type_modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create Publication Type
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="publication_type_modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 lg:p-5">
                                    <div class="grid grid-cols-2 gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newTypeName'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type Name">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                                KH</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newTypeNameKh'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type Name KH">
                                        </div>

                                    </div>
                                    <div class="text-right">
                                        <button data-modal-target="publication_type_modal"
                                            data-modal-toggle="publication_type_modal" type="button"
                                            wire:click='saveNewType' wire:target="saveNewType"
                                            wire:loading.attr="disabled"
                                            class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Type modal -->
                </div>
                <x-input-error :messages="$errors->get('journal_type_id')" class="mt-2" />
            </div>
            {{-- Start Type Select --}}

            {{-- Start Category Select --}}
            <div class="relative w-full mb-5 group">
                <x-input-label for="publication_category_id" :value="__('Topic')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <div class="flex justify-start flex-1">
                        <x-select-option wire:model.live='journal_category_id' id="publication_category_id"
                            name="publication_category_id" class="category-select">
                            <option wire:key='category' value="0">Select Topic...</option>
                            @forelse ($categories as $category)
                                <option wire:key='{{ $category->id }}' value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @empty
                                <option wire:key='nocateogry' value="0"> --No Topic--</option>
                            @endforelse
                        </x-select-option>
                    </div>
                    <button type="button" data-modal-target="category_modal" data-modal-toggle="category_modal"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add
                    </button>

                    <!-- Start Category modal -->
                    <div id="category_modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create Category
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="category_modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 lg:p-5">
                                    <div class="grid grid-cols-2 gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newCategoryName'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Name">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                                KH</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newCategoryNameKh'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Name KH">
                                        </div>


                                    </div>
                                    <div class="text-right">
                                        <button data-modal-target="category_modal" data-modal-toggle="category_modal"
                                            type="button" wire:click='saveNewCategory' wire:target="saveNewCategory"
                                            wire:loading.attr="disabled"
                                            class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Category modal -->

                </div>
                <x-input-error :messages="$errors->get('journal_category_id')" class="mt-2" />
            </div>
            {{-- End Category Select --}}

        </div>

        <div class="grid lg:grid-cols-2 lg:gap-6">
            {{-- Start Location Select --}}
            <div class="relative w-full mb-5 group">
                <x-input-label for="location" :value="__('Location')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <div class="flex justify-start flex-1">
                        <x-select-option wire:model.live='location_id' id="location" name="location_id"
                            class="location-select">
                            <option wire:key='location' value="0">Select Location...</option>
                            @forelse ($locations as $location)
                                <option wire:key='{{ $location->id }}' value="{{ $location->id }}">
                                    {{ $location->name }}</option>
                            @empty
                                <option wire:key='nolocation' value="0"> --No Location--</option>
                            @endforelse
                        </x-select-option>
                    </div>
                    <button type="button" data-modal-target="location_modal" data-modal-toggle="location_modal"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add
                    </button>

                    <!-- Start Location modal -->
                    <div id="location_modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create Location
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="location_modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 lg:p-5">
                                    <div class="grid grid-cols-2 gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newLocationName'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button data-modal-target="location_modal" data-modal-toggle="location_modal"
                                            type="button" wire:click='saveNewLocation' wire:target="saveNewLocation"
                                            wire:loading.attr="disabled"
                                            class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Location modal -->
                </div>
                <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
            </div>
            {{-- End Location Select --}}

            {{-- Start Language Select --}}
            <div class="relative w-full mb-5 group">
                <x-input-label for="language" :value="__('Language')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <div class="flex justify-start flex-1">
                        <x-select-option wire:model.live='language_id' id="language" name="language_id"
                            class="language-select">
                            <option wire:key='language' value="0">Select Language...</option>
                            @forelse ($languages as $language)
                                <option wire:key='{{ $language->id }}' value="{{ $language->id }}">
                                    {{ $language->name }}</option>
                            @empty
                                <option wire:key='nolanguage' value="0"> --No Language--</option>
                            @endforelse
                        </x-select-option>
                    </div>
                    <button type="button" data-modal-target="language_modal" data-modal-toggle="language_modal"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add
                    </button>

                    <!-- Start Language modal -->
                    <div id="language_modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create Language
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="language_modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 lg:p-5">
                                    <div class="grid grid-cols-2 gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newLanguageName'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Name">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                                KH</label>
                                            <input wire:key="{{ rand() }}" type="text" name="name"
                                                id="name" wire:model='newLanguageNameKh'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Name KH">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button data-modal-target="language_modal" data-modal-toggle="language_modal"
                                            type="button" wire:click='saveNewLanguage' wire:target="saveNewLanguage"
                                            wire:loading.attr="disabled"
                                            class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Language modal -->
                </div>
                <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
            </div>
            {{-- End Language Select --}}
        </div>

        {{-- Start Keyword Select --}}
        <div class="relative w-full mb-5 group">
            <x-input-label for="keywords" :value="__('Keywords')" />
            <div class="flex flex-1 gap-1 mt-1">
                <div class="flex justify-start flex-1">
                    <select multiple="multiple" wire:model='keywords'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 keyword-select'
                        id="keywords">
                        @forelse ($allKeywords as $keyword)
                            <option wire:key='{{ $keyword->id }}' value="{{ $keyword->name }}">
                                {{ $keyword->name }}</option>
                        @empty
                            <option wire:key=nokeyword' value="0"> --No Keyword--</option>
                        @endforelse
                    </select>
                </div>
                <button type="button" data-modal-target="keyword_modal" data-modal-toggle="keyword_modal"
                    class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                    Add
                </button>

                <!-- Start Language modal -->
                <div id="keyword_modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Create Keyword
                                </h3>
                                <button type="button"
                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="keyword_modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 lg:p-5">
                                <div class="grid grid-cols-2 gap-4 mb-4 ">
                                    <div class="col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input wire:key="{{ rand() }}" type="text" name="name"
                                            id="name" wire:model='newKeywordName'
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Name">
                                    </div>

                                </div>
                                <div class="text-right">
                                    <button data-modal-target="keyword_modal" data-modal-toggle="keyword_modal"
                                        type="button" wire:click='saveNewKeyword' wire:target="saveNewKeyword"
                                        wire:loading.attr="disabled"
                                        class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Add New
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Keyword modal -->
            </div>
            <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
        </div>
        {{-- End Keyword Select --}}

        {{-- Start Add Resource Links --}}
        <div class="grid gap-5 mb-5 lg:grid-cols-1">
            <div>
                <x-input-label for="link" :value="__('Resource Link')" /><span class="text-red-500">*</span>
                <div class="flex flex-col gap-1">
                    @foreach($resourceLinks as $index => $link)
                        <div class="flex justify-start flex-1 gap-2">
                            <x-text-input id="link_{{ $index }}" class="block w-full" type="text" name="resourceLinks[]"
                                          wire:model="resourceLinks.{{ $index }}" required autofocus placeholder="Link or URL" />
                            <button type="button"
                                    class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-red-700"
                                    wire:click="removeResourceLink({{ $index }})">
                                Remove
                            </button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 mt-2"
                        wire:click="addResourceLink">
                    Add Link
                </button>
                <x-input-error :messages="$errors->get('resourceLinks')" class="mt-2" />
            </div>
        </div>

        {{-- End Add Resource Links --}}

        <div class="mb-5">
            {{-- Start Image Upload --}}
            <div class="flex items-center mb-5 space-4" wire:key='uploadimage'>
                @if ($image)
                    <div class="pt-5 max-w-40">
                        <img src="{{ $image->temporaryUrl() }}" alt="Selected Image"
                            class="max-w-full pr-4 max-h-40" />
                    </div>
                @endif
                <div class="flex flex-col flex-1">
                    <label class='mb-4 text-sm font-medium text-gray-600 dark:text-white'>
                        Upload Image (Max: 2MB) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative flex items-center justify-center w-full -mt-3 overflow-hidden">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 2MB)</p>

                            </div>
                            <input wire:model="image" accept="image/png, image/jpeg, image/gif" id="dropzone-file"
                                type="file" class="absolute h-[140%] w-[100%]" />
                        </label>
                    </div>
                    <div wire:loading wire:target="image" class="text-blue-700">
                        <span>
                            <img class="inline w-6 h-6 text-white me-2 animate-spin"
                                src="{{ asset('assets/images/reload.png') }}" alt="reload-icon">
                            Uploading...
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
            </div>
            {{-- End Image Upload --}}

            {{-- Start PDF Upload --}}
            <div class="flex items-center space-4" wire:key='uploadpdf'>
                <div class="flex flex-col flex-1">
                    <label class='mb-4 text-sm font-medium text-gray-600 dark:text-white'>
                        Upload PDF File (Max : 50MB) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative flex items-center justify-center w-full -mt-3 overflow-hidden">
                        <label for="pdf"
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="mb-2 text-xs text-gray-500 dark:text-gray-400">PDF (MAX. 50MB)</p>
                                @if ($pdf)
                                    <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                                        <span class="font-bold text-md">Uploaded File :</span>
                                        {{ $pdf->getClientOriginalName() }}
                                    </p>
                                @endif
                            </div>
                            <input type="file" wire:model="pdf" id="pdf" name="pdf"
                                accept="application/pdf" class="absolute h-[140%] w-[100%]" />
                        </label>
                    </div>
                    <div wire:loading wire:target="pdf" class="text-blue-700">
                        <span>
                            <img class="inline w-6 h-6 text-white me-2 animate-spin"
                                src="{{ asset('assets/images/reload.png') }}" alt="reload-icon">
                            Uploading...
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
                </div>
            </div>
            {{-- End PDF Upload --}}


        </div>


        <div class="mb-5" wire:ignore>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description"></textarea>
        </div>


        <div>
            <x-outline-button wire:ignore href="{{ URL::previous() }}">
                Go back
            </x-outline-button>
            <button wire:loading.class="cursor-not-allowed" wire:click.prevent="save" wire:target="save, image, pdf" wire:loading.attr="disabled"
                class = 'text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                Save
            </button>
            <span wire:target="save" wire:loading>
                <img class="inline w-6 h-6 text-white me-2 animate-spin"
                    src="{{ asset('assets/images/reload.png') }}" alt="reload-icon">
                Saving
            </span>
            <span wire:target="pdf,image"  wire:loading class="dark:text-white">
                <img class="inline w-6 h-6 text-white me-2 animate-spin"
                    src="{{ asset('assets/images/reload.png') }}" alt="reload-icon">
                On Uploading File...
            </span>
        </div>
    </form>

</div>

@script
    <script>
        let options = {
            filebrowserImageBrowseUrl: "{{ asset('laravel-filemanager?type=Images') }}",
            filebrowserImageUploadUrl: "{{ asset('laravel-filemanager/upload?type=Images&_token=') }}",
            filebrowserBrowseUrl: "{{ asset('laravel-filemanager?type=Files') }}",
            filebrowserUploadUrl: "{{ asset('laravel-filemanager/upload?type=Files&_token=') }}"
        };

        $(document).ready(function() {
            const editor = CKEDITOR.replace('description', options);
            editor.on('change', function(event) {
                console.log(event.editor.getData())
                @this.set('description', event.editor.getData(), false);
            })
        })



        function initSelect2() {
            $(document).ready(function() {
                $('.author-select').select2();
                $('.author-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('author_id', data);
                });

                $('.category-select').select2();
                $('.category-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('journal_category_id', data);
                });

                $('.sub-category-select').select2();
                $('.sub-category-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('journal_sub_category_id', data);

                });

                $('.type-select').select2();
                $('.type-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('journal_type_id', data);
                });

                $('.publisher-select').select2();
                $('.publisher-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('publisher_id', data);
                });

                $('.location-select').select2();
                $('.location-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('location_id', data);
                });

                $('.language-select').select2();
                $('.language-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('language_id', data);
                });

                $('.year-select').select2();
                $('.year-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('year', data);
                });

                $('.keyword-select').select2();
                $('.keyword-select').on('change', function(event) {
                    let data = $(this).val();
                    @this.set('keywords', data);
                    console.log(data);
                });
            });
        }
        initSelect2();

        $(document).ready(function() {
            document.addEventListener('livewire:updated', event => {
                console.log('updated'); // Logs 'Livewire component updated' to browser console
                initSelect2();
                initFlowbite();
            });
        });
    </script>

    {{-- <script>
        document.addEventListener('livewire:loaded', () => {
            initFlowbite();
        });
    </script> --}}
@endscript
