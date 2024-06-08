<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Publication;
use App\Models\PublicationCategory;
use App\Models\PublicationType;

class PublicationCreate extends Component
{
    public function render()
    {

        $categories = PublicationCategory::latest()->get();
        $types = PublicationType::latest()->get();

        return view('livewire.publication-create', [
            'categories' => $categories,
            'types' => $types,
        ]);
    }
}
