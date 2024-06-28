<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WebsiteInfo;
use Livewire\WithFileUploads;

use Image;

class WebsiteInfoEdit extends Component
{
    use WithFileUploads;

    public $image;
    public $banner;

    public $item; // Variable to hold the item record for editing
    public $name;
    public $name_kh;
    public $primary;
    public $primary_hover;
    public $description;
    public $description_kh;

    public function mount(WebsiteInfo $item)
    {
        $this->item = $item; // Initialize the $item variable with the provided item model instance
        $this->name = $item->name;
        $this->name_kh = $item->name_kh;
        $this->primary = $item->primary;
        $this->primary_hover = $item->primary_hover;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }
    public function updatedBanner()
    {
        $this->validate([
            'banner' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Banner successfully uploaded!');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'primary' => 'required|max:255',
            'primary_hover' => 'required|max:255',
        ]);

        // Update the existing item record
        if(!empty($this->image)){
            $filename = time() . '_' . $this->image->getClientOriginalName();

            $image_path = public_path('assets/images/website_infos/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $validated['image'] = $filename;
        }
        // Update the existing item record
        if(!empty($this->banner)){
            $filename = time() . '_' . $this->banner->getClientOriginalName();

            $image_path = public_path('assets/images/website_infos/'.$filename);
            $imageUpload = Image::make($this->banner->getRealPath())->save($image_path);
            $validated['banner'] = $filename;
        }

        $this->item->update($validated);

        session()->flash('success', 'Info updated successfully!');

        // return redirect('admin/settings/website_infos');
    }

    public function render()
    {
        return view('livewire.website-info-edit');
    }
}