<div>
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
        <div class="grid mb-4 md:grid-cols-3 md:gap-6">
            <div>
                <x-input-label for="pages_count" :value="__('Pages Count')" />
                <x-text-input id="pages_count" class="block w-full mt-1" type="text" name="pages_count"
                    wire:model='pages_count' autofocus placeholder="Pages Count" />
                <x-input-error :messages="$errors->get('pages_count')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="year" :value="__('Year')" />
                <x-select-option wire:model.live='year' id="year" name="year">
                    <option value="">Select Year...</option>

                    @for ($year = date('Y'); $year >= 1980; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </x-select-option>
                <x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="isbn" :value="__('ISBN')" />
                <x-text-input id="isbn" class="block w-full mt-1" type="text" name="isbn" wire:model='isbn'
                    placeholder="ISBN" />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
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
                            <option wire:key='{{ $category->id }}' value="{{ $category->id }}">{{ $category->name }}
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
@endscript
