<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Area as SubCategory;
use App\Models\ProtectedArea as Category;

class SubTableData extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $filter = 0;

    #[Url(history: true)]
    public $sortBy = 'id';

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
        $subCategory = SubCategory::find($id);
        $subCategory->delete();

        session()->flash('success', 'Sub-Category successfully deleted!');
    }

     // ==========Add New SubCategory============
     public $newName = null;
     public $new_category_id = null;

     public function save()
     {
         try {
             $validated = $this->validate([
                 'newName' => 'required|string|max:255|unique:areas,name',
                 'new_category_id' => 'required',
             ]);

             SubCategory::create([
                 'name' => $this->newName,
                 'protected_area_id' => $this->new_category_id,
             ]);

             return redirect('admin/general/sub')->with('success', 'Add successfully!');
             session()->flash('success', 'Add successfully!');

             $this->reset(['newName', 'new_category_id']);

         } catch (\Illuminate\Validation\ValidationException $e) {
             session()->flash('error', $e->validator->errors()->all());
         }
     }

     public $editId = null;
     public $name;
     public $category_id;

     public function setEdit($id) {
        $subCategory = SubCategory::find($id);
        $this->editId = $id;
        $this->name = $subCategory->name;
        $this->category_id = $subCategory->protected_area_id;
     }

     public function cancelUpdate() {
        $this->editId = null;
        $this->name = null;
        $this->gender = null;
        $this->category_id = null;
     }

     public function update($id) {
        try {
            $validated = $this->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
            ]);

            $subCategory = SubCategory::find($id);
            $subCategory->update([
                'name' => $this->name,
                'protected_area_id' => $this->category_id
            ]);

            session()->flash('success', 'Successfully edited!');

            $this->reset(['name', 'editId']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
     }

    public function render(){

        $items = SubCategory::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%");
                            })
                            ->orderBy($this->sortBy, $this->sortDir)->with('protected_area')->paginate($this->perPage);
        $categories = Category::all();
        return view('livewire.sub-table-data', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }
}
