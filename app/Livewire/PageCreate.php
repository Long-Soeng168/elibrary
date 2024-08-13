<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Page;
use App\Models\ProtectedArea;
use App\Models\Area;

use Image;
use Storage;

class PageCreate extends Component
{
    public $name = null;
    public $image_url = null;
    public $video_url = null;
    public $description = null;
    public $protected_area_id = null;
    public $area_id = null;

    public function updated()
    {
        $this->dispatch('livewire:updated');
    }


    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'video_url' => 'nullable|string|max:255',
            'protected_area_id' => 'required|exists:protected_area,id',
            'area_id' => 'required|exists:areas,id',
            'description' => 'nullable',
        ]);

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                unset($validated[$key]);
            }
        }

        $createdPage = Page::create($validated);

        // dd($createdPage);
        return redirect('admin/general/page')->with('success', 'Successfully Created!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        $categories = ProtectedArea::latest()->get();
        $subCategories = Area::where('protected_area_id', $this->protected_area_id)->latest()->get();

        return view('livewire.page-create', [
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }
}
