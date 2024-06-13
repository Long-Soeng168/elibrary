<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PublicationCategory;

class CategorySelectComponent extends Component
{
    public $category_id;
    public $newCategoryName;
    public $newCategoryNameKh;

    public function saveNewCategory()
    {
        try {
            $this->validate([
                'newCategoryName' => 'required|string|max:255|unique:publication_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            $category = PublicationCategory::create([
                'name' => $this->newCategoryName,
                'name_kh' => $this->newCategoryNameKh,
            ]);

            session()->flash('success', 'Add New Category successfully!');

            $this->reset(['newCategoryName', 'newCategoryNameKh']);

            // Emit the event to notify parent
            // $this->dispatch('categoryAdded');

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }

    public function render()
    {
        $categories = PublicationCategory::all();
        return view('livewire.category-select-component', [
            'categories' => $categories,
        ]);
    }
}
