<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProtectedArea;

use Image;
use Storage;

class MainCreate extends Component
{
    use WithFileUploads;

    public $image;
    // public $pdf;


    public $name = null;
    public $order_index = null;

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
            'order_index' => 'nullable|max:255',
            'image' => 'required|image|max:2048',
        ]);

        // dd($validated);

        if(!empty($this->image)){
            try {
                $file = $this->image;
                $filename = time() . str()->random(10) . '.' . $file->getClientOriginalExtension();
                $filePath = env('AWS_File_Path') . '/general/' . $filename;
                $uploadSuccess = Storage::disk('s3')->put($filePath, $file->get());
                if (!$uploadSuccess) {
                    throw new \Exception('Failed to upload the file to S3.');
                }
            } catch (\Exception $e) {
                session()->flash('error', ['Error: ' . $e->getMessage()]);
                return redirect()->back();
            }

            $validated['image'] = $filename;
        }

        $createdPublication = ProtectedArea::create($validated);

        // dd($createdPublication);
        return redirect('admin/general/main')->with('success', 'Successfully Created!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        // dd($allKeywords);
        // dump($this->selectedallKeywords);

        return view('livewire.main-create');
    }
}
