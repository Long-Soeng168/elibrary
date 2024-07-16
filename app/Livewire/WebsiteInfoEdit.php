<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WebsiteInfo;
use Livewire\WithFileUploads;

use Image;
use Illuminate\Support\Facades\File;

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
    public $banner_color;
    public $show_bg_menu;

    public $description;
    public $description_kh;

    public function mount(WebsiteInfo $item)
    {
        $this->item = $item; // Initialize the $item variable with the provided item model instance
        $this->name = $item->name;
        $this->name_kh = $item->name_kh;
        $this->primary = $item->primary;
        $this->primary_hover = $item->primary_hover;
        $this->banner_color = $item->banner_color;
        $this->show_bg_menu = (bool) $item->show_bg_menu;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|mimes:png|max:2048', // 2MB Max
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
            'banner_color' => 'required|max:255',
            'show_bg_menu' => 'required|boolean',
        ]);

        if(!empty($this->image)){
            $old_path = public_path('assets/images/website_infos/logo.png');
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            // $filename = time() . '_' . $this->image->getClientOriginalName();
            $filename = 'logo.png';


            $image_path = public_path('assets/images/website_infos/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $validated['image'] = $filename;
        }
        if(!empty($this->banner)){
            $old_path = public_path('assets/images/website_infos/' . $this->item->image);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            $filename = time() . '_' . $this->banner->getClientOriginalName();
            // $filename = 'banner.png';

            $image_path = public_path('assets/images/website_infos/'.$filename);
            $imageUpload = Image::make($this->banner->getRealPath())->save($image_path);
            $validated['banner'] = $filename;
        }

        $this->item->update($validated);

        session()->flash('success', 'Info updated successfully!');

        return redirect('admin/settings/website_infos/1/edit');
    }

    public function render()
    {
        return view('livewire.website-info-edit');
    }
}
