<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\PublicationSubCategory;
use App\Models\PublicationCategory;

class PublicationSubCategoryTableData extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $filter = 0;

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    public function setFilter($value) {
        $this->filter = $value;
        $this->resetPage();
    }

    public function setSortBy($newSortBy) {
        if($this->sortBy == $newSortBy){
            $newSortDir = ($this->sortDir == 'DESC') ? 'ASC' : 'DESC';
            $this->sortDir = $newSortDir;
        }else{
            $this->sortBy = $newSortBy;
        }
    }

    // ResetPage when updated search
    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id)
    {
        $PublicationSubCategory = PublicationSubCategory::find($id);
        $PublicationSubCategory->delete();

        session()->flash('success', 'Sub-Category successfully deleted!');
    }

     // ==========Add New PublicationSubCategory============
     public $newName = null;
     public $newPublication_category_id = null;

     public function save()
     {
         try {
             $validated = $this->validate([
                 'newName' => 'required|string|max:255|unique:publication_sub_categories,name',
                 'newPublication_category_id' => 'required',
             ]);

             PublicationSubCategory::create([
                 'name' => $this->newName,
                 'publication_category_id' => $this->newPublication_category_id,
             ]);

             session()->flash('success', 'Add New Category successfully!');

             $this->reset(['newName', 'newPublication_category_id']);

         } catch (\Illuminate\Validation\ValidationException $e) {
             session()->flash('error', $e->validator->errors()->all());
         }
     }

     public $editId = null;
     public $name;
     public $publication_category_id;

     public function setEdit($id) {
        $PublicationSubCategory = PublicationSubCategory::find($id);
        $this->editId = $id;
        $this->name = $PublicationSubCategory->name;
        $this->publication_category_id = $PublicationSubCategory->publication_category_id;
     }

     public function cancelUpdate() {
        $this->editId = null;
        $this->name = null;
        $this->gender = null;
        $this->publication_category_id = null;
     }

     public function update($id) {
        try {
            $validated = $this->validate([
                'name' => 'required|string|max:255|unique:publication_sub_categories,name,' . $id,
                'publication_category_id' => 'required',
            ]);

            $PublicationSubCategory = PublicationSubCategory::find($id);
            $PublicationSubCategory->update([
                'name' => $this->name,
                'publication_category_id' => $this->publication_category_id
            ]);

            session()->flash('success', 'Sub-Category successfully edited!');

            $this->reset(['name', 'editId']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
     }

    public function render(){

        $items = PublicationSubCategory::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%");
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->with('category')->paginate($this->perPage);
        $categories = PublicationCategory::all();
        return view('livewire.publication-sub-category-table-data', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }
}
