<div>
    <form class="w-full" action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid mb-4 md:grid-cols-1 md:gap-6">
            <!-- Name Address -->
            <div>
                <x-input-label for="name" :value="__('Title')" /><span class="text-red-500">*</span>
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                    required autofocus placeholder="Title" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

        </div>
        <div class="grid mb-4 md:grid-cols-2 md:gap-6">
            <div>
                <x-input-label for="page_count" :value="__('Pages Count')" />
                <x-text-input id="page_count" class="block w-full mt-1" type="text" name="page_count"
                    :value="old('page_count')" required autofocus placeholder="page_count" />
                <x-input-error :messages="$errors->get('page_count')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="isbn" :value="__('ISBN')" />
                <x-text-input id="isbn" class="block w-full mt-1" type="text" name="isbn" :value="old('isbn')"
                    required autofocus placeholder="ISBN" />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="categories" :value="__('Categories')" />
                <div class="flex">
                    <div class="flex-1">
                        <x-select-option id="categories" name="category_id">
                            <option>Select Category...</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                <option> --No Category--</option>
                            @endforelse
                        </x-select-option>
                    </div>
                    <button class="text-sm font-medium text-center text-white bg-blue-700 ">
                        Add
                    </button>
                </div>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="types" :value="__('Sub-Category')" />
                <x-select-option id="types" name="type_id">
                    <option>Select Sub-Category...</option>
                    @forelse ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @empty
                        <option>--No Type--</option>
                    @endforelse
                </x-select-option>
                <x-input-error :messages="$errors->get('type_id')" class="mt-2" />
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="types" :value="__('Types')" />
                <x-select-option id="types" name="type_id">
                    <option>Select Type...</option>
                    @forelse ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @empty
                        <option>--No Type--</option>
                    @endforelse
                </x-select-option>
                <x-input-error :messages="$errors->get('type_id')" class="mt-2" />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="categories" :value="__('Publisher')" />
                <x-select-option id="categories" name="category_id">
                    <option>Select Publisher...</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option> --No Category--</option>
                    @endforelse
                </x-select-option>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>

        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="categories" :value="__('Location')" />
                <x-select-option id="categories" name="category_id">
                    <option>Select Location...</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option> --No Category--</option>
                    @endforelse
                </x-select-option>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="types" :value="__('Language')" />
                <x-select-option id="types" name="type_id">
                    <option>Select Language...</option>
                    @forelse ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @empty
                        <option>--No Type--</option>
                    @endforelse
                </x-select-option>
                <x-input-error :messages="$errors->get('type_id')" class="mt-2" />
            </div>
        </div>

        <div class="mb-5">
            <div class="flex items-center space-4">
                <div class="max-w-40">
                    <img id="selected-image" src="#" alt="Selected Image"
                        class="hidden max-w-full pr-4 max-h-40" />
                </div>
                <div class="flex-1">
                    <x-input-label for="types" :value="__('Upload Image (max : 2MB)')" /><span class="text-red-500">*</span>
                    <x-file-input id="dropzone-file" type="file" name="image"
                        accept="image/png, image/jpeg, image/gif" onchange="displaySelectedImage(event)" />
                </div>
            </div>
        </div>

        <div class="mb-5">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description"></textarea>
        </div>


        <div>
            <x-outline-button href="{{ URL::previous() }}">
                Go back
            </x-outline-button>
            <x-submit-button>
                Submit
            </x-submit-button>
        </div>
    </form>

</div>
