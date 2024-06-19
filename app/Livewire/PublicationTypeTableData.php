<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\PublicationType;

class PublicationTypeTableData extends Component
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
        $PublicationType = PublicationType::find($id);
        $PublicationType->delete();

        session()->flash('success', 'Type successfully deleted!');
    }

     // ==========Add New PublicationType============
     public $newName = null;

     public function save()
     {
         try {
             $validated = $this->validate([
                 'newName' => 'required|string|max:255|unique:publication_types,name',
             ]);

             PublicationType::create([
                 'name' => $this->newName,
             ]);

             session()->flash('success', 'Add New PublicationType successfully!');

             $this->reset(['newName']);

         } catch (\Illuminate\Validation\ValidationException $e) {
             session()->flash('error', $e->validator->errors()->all());
         }
     }

     public $editId = null;
     public $name;

     public function setEdit($id) {
        $PublicationType = PublicationType::find($id);
        $this->editId = $id;
        $this->name = $PublicationType->name;
     }

     public function cancelUpdate() {
        $this->editId = null;
        $this->name = null;
        $this->gender = null;
     }

     public function update($id) {
        try {
            $validated = $this->validate([
                'name' => 'required|string|max:255|unique:publication_types,name,' . $id,
            ]);

            $PublicationType = PublicationType::find($id);
            $PublicationType->update([
                'name' => $this->name,
            ]);

            session()->flash('success', 'PublicationType successfully edited!');

            $this->reset(['name', 'editId']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
     }

    public function render(){

        $items = PublicationType::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%");
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->paginate($this->perPage);

        return view('livewire.publication-type-table-data', [
            'items' => $items,
        ]);
    }
}
