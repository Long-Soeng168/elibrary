<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

use App\Models\Audio as Archive;
use App\Models\AudioCategory as Category;
use App\Models\AudioSubCategory as SubCategory;

class AudioIndex extends Component
{
    // Start Category Filter
    public $selected_categories = [];
    public $selected_categories_item = [];

    public function handleSelectCategory($id)
    {
        $item = Category::findOrFail($id);
        if (in_array($id, $this->selected_categories)) {
            $this->selected_categories = array_diff($this->selected_categories, [$id]);
            $this->selected_categories_item = array_filter($this->selected_categories_item, function ($i) use ($item) {
                return $i->id !== $item->id;
            });
        } else {
            $this->selected_categories[] = $id;
            $this->selected_categories_item[] = $item;
        }
    }

    public $selected_sub_categories = [];
    public $selected_sub_categories_item = [];

    public function handleSelectSubCategory($id)
    {
        $item = SubCategory::findOrFail($id);
        if (in_array($id, $this->selected_sub_categories)) {
            $this->selected_sub_categories = array_diff($this->selected_sub_categories, [$id]);
            $this->selected_sub_categories_item = array_filter($this->selected_sub_categories_item, function ($i) use ($item) {
                return $i->id !== $item->id;
            });
        } else {
            $this->selected_sub_categories[] = $id;
            $this->selected_sub_categories_item[] = $item;
        }
    }

    public function handleRemoveCategoryName($item)
    {
        $this->dispatch('livewire:updatedName', $item['name']);
        // Remove the item from the selected_categories_item array
        $this->selected_categories_item = array_filter($this->selected_categories_item, function ($i) use ($item) {
            return $i->id !== $item['id'];
        });
        // Remove the associated ID from the selected_categories array
        $this->selected_categories = array_filter($this->selected_categories, function ($id) use ($item) {
            return $id !== $item['id'];
        });
    }

    public function handleRemoveSubCategoryName($item)
    {
        $this->dispatch('livewire:updatedName', $item['name']);
        // Remove the item from the selected_sub_categories_item array
        $this->selected_sub_categories_item = array_filter($this->selected_sub_categories_item, function ($i) use ($item) {
            return $i->id !== $item['id'];
        });
        // Remove the associated ID from the selected_sub_categories array
        $this->selected_sub_categories = array_filter($this->selected_sub_categories, function ($id) use ($item) {
            return $id !== $item['id'];
        });
    }
    // End Category Filter

    // public function update() {
    //     $this->dispatch('livewire:updated');
    // }

    public function handleClearAllFilter() {
        $this->dispatch('livewire:updatedClearAllFilter');
        $this->selected_categories = [];
        $this->selected_categories_item = [];
        $this->selected_sub_categories = [];
        $this->selected_sub_categories_item = [];
    }

    #[Url(history: true)]
    public $search = '';

    public $perPage = 24;

    use WithPagination;
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatedSelectedSubCategories()
    {
        $this->resetPage();
    }



    public function render()
    {
        $query = Archive::query();

        if (!empty($this->selected_categories) && empty($this->selected_sub_categories)) {
            $query->where(function ($subQuery) {
                $subQuery->whereIn('audio_category_id', $this->selected_categories);
            });
        }elseif (empty($this->selected_categories) && !empty($this->selected_sub_categories)) {
            $query->where(function ($subQuery) {
                $subQuery->whereIn('audio_sub_category_id', $this->selected_sub_categories);
            });
        }elseif(!empty($this->selected_categories) && !empty($this->selected_sub_categories)) {
            $query->where(function ($subQuery) {
                $subQuery->whereIn('audio_category_id', $this->selected_categories)
                         ->orWhereIn('audio_sub_category_id', $this->selected_sub_categories);
            });
        }

        if ($this->search !== '') {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'LIKE', "%{$this->search}%")
                         ->orWhere('description', 'LIKE', "%{$this->search}%")
                         ->orWhere('keywords', 'LIKE', "%{$this->search}%")
                         ->orWhere('year', 'LIKE', "%{$this->search}%")
                         ->orWhereHas('author', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->search}%");
                         })
                         ->orWhereHas('publisher', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->search}%");
                         })
                         ->orWhereHas('language', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->search}%");
                         })
                         ->orWhereHas('location', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->search}%");
                         });
            });
        }

        $items = $query->latest()->paginate($this->perPage);

        $categories = Category::latest()->get();
        return view('livewire.audio-index', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }
}
