<?php

namespace App\Livewire;

use Livewire\Component;

class SubCategorySelectComponent extends Component
{
    public $categories;
    public $subCategories;
    public $publication_category_id;
    public $publication_sub_category_id;
    public $newSubCategoryName;
    public $newSubCategoryNameKh;
    public $selectedCategoryId;

    public function saveNewSubCategory()
    {
        // Logic to save the new sub-category
    }
    public function render()
    {
        return view('livewire.sub-category-select-component');
    }
}
