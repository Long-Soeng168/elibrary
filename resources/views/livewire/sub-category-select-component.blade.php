<div class="relative w-full mb-5 group">
    <x-input-label for="publication_sub_category_id" :value="__('Sub-Category')" />
    <div class="flex flex-1 gap-1 mt-1">
        <div class="flex justify-start flex-1">
            <x-select-option wire:model.live='publication_sub_category_id' id="publication_sub_category_id"
                name="category_id" class="sub-category-select">
                <option value="">
                    {{ $publication_category_id ? 'Select Sub-Category...' : 'Select Category First' }}
                </option>
                @forelse ($subCategories as $subCategory)
                    <option wire:key='{{ $subCategory->id }}' value="{{ $subCategory->id }}">
                        {{ $subCategory->name }}
                    </option>
                @empty
                    <option value="">--No Category--</option>
                @endforelse
            </x-select-option>
        </div>
        <button type="button" data-modal-target="sub_category_modal" data-modal-toggle="sub_category_modal"
            class="rounded-md text-sm p-2.5 font-medium text-center text-white bg-blue-700">
            Add
        </button>

        <!-- Start Sub-Category modal -->
        <div id="sub_category_modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full lg:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t lg:p-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Create Sub-Category
                        </h3>
                        <button type="button"
                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="sub_category_modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 lg:p-5">
                        <div class="grid grid-cols-2 gap-4 mb-4 ">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input wire:key="{{ rand() }}" type="text" name="name" id="name" wire:model='newSubCategoryName'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Sub Category Name">
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name KH</label>
                                <input wire:key="{{ rand() }}" type="text" name="name" id="name" wire:model='newSubCategoryNameKh'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Sub Category Name KH">
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select id="category" wire:model='selectedCategoryId'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @empty
                                        <option value="">--No Category--</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button data-modal-target="sub_category_modal" data-modal-toggle="sub_category_modal" type="button" wire:click='saveNewSubCategory' wire:target="saveNewSubCategory" wire:loading.attr="disabled"
                                class="text-white mt-2 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Add New
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sub-Category modal -->
    </div>
    <x-input-error :messages="$errors->get('publication_sub_category_id')" class="mt-2" />
</div>
