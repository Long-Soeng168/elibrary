<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Audio;
use App\Models\AudioCategory;

class AudioTableData extends Component
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

    public function render(){

        $items = Audio::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%")
                                    ->orWhere('description', 'LIKE', "%$this->search%");
                            })
                            ->when($this->filter != 0, function($query){
                                $query->where('audio_category_id', $this->filter);
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->paginate($this->perPage);
        $categories = AudioCategory::latest()->get();
        $selectedCategory = AudioCategory::find($this->filter);

        return view('livewire.audio-table-data', [
            'items' => $items,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}