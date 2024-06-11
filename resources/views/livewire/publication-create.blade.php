<div>
    @if (session('success'))
        {{-- @if (true) --}}
        <div class="absolute top-4 right-4" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)">
            <div id="alert-border-3" x-show="show"
                class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="min-w-[250px] text-sm font-medium ms-3">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-3" aria-label="Close" @click="show = false">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div id="alert-2"
            class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div>
                @foreach ($errors->all() as $error)
                    <div class="text-sm font-medium ms-3">
                        {{ $error }}
                    </div>
                @endforeach

            </div>
        </div>
    @endif
    <form class="w-full" action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid mb-4 md:grid-cols-1 md:gap-6">
            <!-- Name Address -->
            <div>
                <x-input-label for="name" :value="__('Title')" /><span class="text-red-500">*</span>
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" wire:model='name'
                    required autofocus placeholder="Title" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

        </div>
        <div class="grid mb-4 md:grid-cols-2 md:gap-6">
            <div>
                <x-input-label for="pages_count" :value="__('Pages Count')" />
                <x-text-input id="pages_count" class="block w-full mt-1" type="text" name="pages_count"
                    wire:model='pages_count' autofocus placeholder="Pages Count" />
                <x-input-error :messages="$errors->get('pages_count')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="isbn" :value="__('ISBN')" />
                <x-text-input id="isbn" class="block w-full mt-1" type="text" name="isbn" wire:model='isbn'
                    placeholder="ISBN" />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>
        </div>


        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative w-full mb-5 group">
                <x-input-label for="author" :value="__('Author')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='author_id' id="author" name="author_id">
                        <option value="">Select Author...</option>
                        @forelse ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @empty
                            <option value=""> --No Author--</option>
                        @endforelse
                    </x-select-option>
                    <button type="button" data-modal-target="author_modal" data-modal-toggle="author_modal"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $author_id }}
                    </button>

                    <!-- Start Author modal -->
                    <div id="author_modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create Author
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="author_modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <div class="grid grid-cols-2 gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="name" id="name"
                                                wire:model='newAuthorName'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type name">

                                            <p class="pt-1 text-sm text-red-500">Name are required & Unique
                                                {{ $newAuthorName }}</p>
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <label for="category"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                            <select id="category" wire:model='newAuthorGender'
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="">Select gender</option>
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
                                            Add New Author
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

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="year" :value="__('Year')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='year' id="year" name="year">
                        <option value="">Select Year...</option>

                        @for ($year = date('Y'); $year >= 1980; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </x-select-option>
                    {{-- <button type="button"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $year }}
                    </button> --}}
                </div>
                <x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>

        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="publication_category_id" :value="__('Category')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='publication_category_id' id="publication_category_id"
                        name="publication_category_id">
                        <option value="">Select Category...</option>
                        @forelse ($categories as $category)
                            <option wire:key='{{ $category->id }}' value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @empty
                            <option value=""> --No Category--</option>
                        @endforelse
                    </x-select-option>
                    <button type="button"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $publication_category_id }}
                    </button>
                </div>
                <x-input-error :messages="$errors->get('publication_category_id')" class="mt-2" />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="publication_sub_category_id" :value="__('Sub-Category')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='publication_sub_category_id' id="publication_sub_category_id"
                        name="category_id">
                        <option value="">
                            {{ $publication_category_id ? 'Select Sub-Category...' : 'Select Category First' }}
                        </option>
                        @forelse ($subCategories as $subCategory)
                            <option wire:key='{{ $subCategory->id }}' value="{{ $subCategory->id }}">
                                {{ $subCategory->name }}</option>
                        @empty
                            <option value="">--No Category--</option>
                        @endforelse
                    </x-select-option>
                    <button type="button"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $publication_sub_category_id }}
                    </button>
                </div>
                <x-input-error :messages="$errors->get('publication_sub_category_id')" class="mt-2" />
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="types" :value="__('Types')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='publication_type_id' id="types" name="publication_type_id">
                        <option value="">Select Type...</option>
                        @forelse ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @empty
                            <option value="">--No Type--</option>
                        @endforelse
                    </x-select-option>
                    <button type="button"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $publication_type_id }}
                    </button>
                </div>
                <x-input-error :messages="$errors->get('publication_type_id')" class="mt-2" />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="publisher" :value="__('Publisher')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='publisher_id' id="publisher" name="publisher_id">
                        <option value="">Select Publisher...</option>
                        @forelse ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                        @empty
                            <option value=""> --No Publisher--</option>
                        @endforelse
                    </x-select-option>
                    <button type="button"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $publisher_id }}
                    </button>
                </div>
                <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
            </div>

        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="location" :value="__('Location')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='location_id' id="location" name="location_id">
                        <option value="">Select Location...</option>
                        @forelse ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @empty
                            <option value=""> --No Location--</option>
                        @endforelse
                    </x-select-option>
                    <button type="button"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $location_id }}
                    </button>
                </div>
                <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="language" :value="__('Language')" />
                <div class="flex flex-1 gap-1 mt-1">
                    <x-select-option wire:model.live='language_id' id="language" name="language_id">
                        <option value="">Select Language...</option>
                        @forelse ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @empty
                            <option value=""> --No Language--</option>
                        @endforelse
                    </x-select-option>
                    <button type="button"
                        class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700 ">
                        Add {{ $language_id }}
                    </button>
                </div>
                <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
            </div>
        </div>
        <div class="mb-5">
            <div class="flex items-center space-4">
                <div class="max-w-40">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="Selected Image"
                            class="max-w-full pr-4 max-h-40" />
                    @endif
                </div>
                <div class="flex flex-col flex-1">
                    <div>
                        <x-input-label for="types" :value="__('Upload Image (max : 2MB)')" />
                        <span class="text-red-500">*</span>
                    </div>
                    <input type="file" wire:model="image" id="dropzone-file" name="image"
                        accept="image/png, image/jpeg, image/gif" />
                    <div wire:loading wire:target="image" class="text-blue-700">
                        <svg aria-hidden="true" role="status"
                            class="inline w-4 h-4 text-gray-200 me-3 animate-spin dark:text-gray-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="#1C64F2" />
                        </svg>
                        Uploading...
                    </div>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="flex flex-col flex-1">
                    <div>
                        <x-input-label for="pdf" :value="__('Upload PDF File (max : 10MB)')" />
                        <span class="text-red-500">*</span>
                    </div>
                    <input type="file" wire:model="pdf" id="dropzone-file" name="pdf"
                        accept="application/pdf" />
                    <div wire:loading wire:target="pdf" class="text-blue-700">
                        <svg aria-hidden="true" role="status"
                            class="inline w-4 h-4 text-gray-200 me-3 animate-spin dark:text-gray-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="#1C64F2" />
                        </svg>
                        Uploading...
                    </div>
                    <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
                </div>

            </div>

        </div>

        <div class="mb-5" wire:ignore>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description"></textarea>
        </div>

        <div>
            <x-outline-button href="{{ URL::previous() }}">
                Go back
            </x-outline-button>
            <button wire:click.prevent = "save"
                class = 'text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                Save
            </button>

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
                @this.set('description', event.editor.getData());
            })
        })
    </script>

    <script>
        document.addEventListener('livewire:loaded', () => {
            initFlowbite();
        });
    </script>
@endscript
