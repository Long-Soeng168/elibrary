<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Database;

use Image;

class DatabaseCreate extends Component
{
    use WithFileUploads;

    public $image;
    // public $pdf;


    public $name = null;
    public $name_kh = null;
    public $link = null;
    public $description = null;
    public $description_kh = null;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    // public function updatedPdf()
    // {
    //     $this->validate([
    //         'pdf' => 'file|max:2048', // 2MB Max
    //     ]);

    //     session()->flash('success', 'PDF successfully uploaded!');
    // }

    // public function updated()
    // {
    //     $this->dispatch('livewire:updated');
    // }


    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'image' => 'required|file|max:2048',
            'link' => 'required|url|max:255',
        ]);

        // $validated['create_by_user_id'] = request()->user()->id;

        // dd($validated);

        if(!empty($this->image)){
            $filename = time() . '_' . $this->image->getClientOriginalName();

            $image_path = public_path('assets/images/databases/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $validated['image'] = $filename;
        }

        // if (!empty($this->pdf)) {
        //     $filename = time() . '_' . $this->pdf->getClientOriginalName();
        //     $this->pdf->storeAs('publications', $filename, 'publicForPdf');
        //     $validated['pdf'] = $filename;
        // }

        $createdPublication = Database::create($validated);

        // dd($createdPublication);
        return redirect('admin/settings/databases')->with('success', 'Successfully Created!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        // dd($allKeywords);
        // dump($this->selectedallKeywords);

        return view('livewire.database-create');
    }
}
