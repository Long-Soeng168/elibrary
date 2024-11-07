<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

use App\Models\Jstor as Archive;
use App\Models\JstorCategory as Category;
use App\Models\PublicationSubCategory as SubCategory;

class JstorIndex extends Component
{
    // Start Category Filter
    // #[Url(history: true)]
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
            $this->selected_categories[0] = $id;
            $this->selected_categories_item[0] = $item;
        }
    }

    // #[Url(history: true)]
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
            $this->selected_sub_categories[0] = $id;
            $this->selected_sub_categories_item[0] = $item;
        }
    }

    public function handleRemoveCategoryName($item)
    {
         if (app()->getLocale() == 'kh' && $item['name_kh']) {
            $this->dispatch('livewire:updatedName', $item['name_kh']);
        } else {
            $this->dispatch('livewire:updatedName', $item['name']);
        }
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
         if (app()->getLocale() == 'kh' && $item['name_kh']) {
            $this->dispatch('livewire:updatedName', $item['name_kh']);
        } else {
            $this->dispatch('livewire:updatedName', $item['name']);
        }
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
    // public $perPage = 1;

    use WithPagination;

    public function updatingPage(){
        $this->dispatch('livewire:updatedPage');
    }

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


    public function placeholder()
    {
        return view('client.placeholder.index');
    }

    public function render()
    {
        $query = Archive::query();

        if (!empty($this->selected_categories) && empty($this->selected_sub_categories)) {
            $query->where(function ($subQuery) {
                 $subQuery->where('name', 'LIKE', "%{$this->selected_categories_item[0]->name}%")
                         ->orWhere('description', 'LIKE', "%{$this->selected_categories_item[0]->name}%")
                         ->orWhere('keywords', 'LIKE', "%{$this->selected_categories_item[0]->name}%")
                         ->orWhere('isbn', 'LIKE', "%{$this->selected_categories_item[0]->name}%")
                         ->orWhere('year', 'LIKE', "%{$this->selected_categories_item[0]->name}%")
                         ->orWhereHas('author', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->selected_categories_item[0]->name}%");
                         })
                         ->orWhereHas('publisher', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->selected_categories_item[0]->name}%");
                         })
                         ->orWhereHas('category', function ($q) {
                             $q->where('id', $this->selected_categories_item[0]->id);
                         })
                         ->orWhereHas('language', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->selected_categories_item[0]->name}%");
                         })
                         ->orWhereHas('location', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->selected_categories_item[0]->name}%");
                         });
            });
        }elseif (empty($this->selected_categories) && !empty($this->selected_sub_categories)) {
            $query->where(function ($subQuery) {
                $subQuery->whereIn('publication_sub_category_id', $this->selected_sub_categories);
            });
        }elseif(!empty($this->selected_categories) && !empty($this->selected_sub_categories)) {
            $query->where(function ($subQuery) {
                $subQuery->whereIn('jstor_category_id', $this->selected_categories)
                         ->orWhereIn('publication_sub_category_id', $this->selected_sub_categories);
            });
        }

        if ($this->search !== '') {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'LIKE', "%{$this->search}%")
                         ->orWhere('description', 'LIKE', "%{$this->search}%")
                         ->orWhere('keywords', 'LIKE', "%{$this->search}%")
                         ->orWhere('isbn', 'LIKE', "%{$this->search}%")
                         ->orWhere('year', 'LIKE', "%{$this->search}%")
                         ->orWhereHas('author', function ($q) {
                             $q->where('name', 'LIKE', "%{$this->search}%");
                         })
                         ->orWhereHas('category', function ($q) {
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

        $items = $query->orderBy('id', 'DESC')->paginate($this->perPage);

        $categories = Category::orderBy('id', 'ASC')->get();

        return view('livewire.jstor-index', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }
}

