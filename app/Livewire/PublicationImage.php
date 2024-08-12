<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PublicationImage as MultiImage;
use App\Models\Publication;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Facades\File;
use Storage;

class PublicationImage extends Component
{
    use WithFileUploads;

    public $images = []; // Updated to hold multiple images
    public $item;

    public function mount(Publication $item)
    {
        $this->item = $item; // Initialize the $item variable with the provided item model instance
    }

    public function removeImage($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function delete($id)
    {
        $image = MultiImage::findOrFail($id);

        // Get the path to the image
        // $imagePathThumb = public_path('assets/images/publications/thumb/' . $image->image);
        // $imagePath = public_path('assets/images/publications/' . $image->image);

        // // Delete the image file from the filesystem
        // if (File::exists($imagePathThumb)) {
        //     File::delete($imagePathThumb);
        // }
        // if (File::exists($imagePath)) {
        //     File::delete($imagePath);
        // }

        // Delete the record from the database
        $image->delete();

        session()->flash('success', 'File deleted successfully!');
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:2048', // 2MB Max for each image
        ]);

        session()->flash('success', 'File uploaded successfully!');
    }

    public function save()
    {
        if (empty($this->images)) {
            session()->flash('error', ['Image is required!']);
            return;
        }

        $this->validate([
            'images.*' => 'image|max:2048', // 2MB Max for each image
        ]);

        // Ensure directories exist
        // $publicationPath = public_path('assets/images/publications');
        // $thumbPath = public_path('assets/images/publications/thumb');
        // if (!File::exists($publicationPath)) {
        //     File::makeDirectory($publicationPath, 0755, true);
        // }
        // if (!File::exists($thumbPath)) {
        //     File::makeDirectory($thumbPath, 0755, true);
        // }

        foreach ($this->images as $image) {
            if (!empty($image)) {
                try {
                    $file = $image;
                    $filename = time() . str()->random(10) . '.' . $file->getClientOriginalExtension();
                    // Process and upload the original image to S3
                    // dd($this->image->getRealPath()) ;
                    $image = Image::make($file->getRealPath())->encode();
                    $image_path =  env('AWS_File_Path') . '/' . $filename;
                    $uploadSuccess = Storage::disk('s3')->put($image_path, $image);
                    if (!$uploadSuccess) {
                        throw new \Exception('Failed to upload the original image.');
                    }
                    // Process and upload the thumbnail to S3
                    $image_thumb = Image::make($file->getRealPath())
                        ->resize(400, null, function($resize) {
                            $resize->aspectRatio();
                        })
                        ->encode();
                    $image_thumb_path = env('AWS_File_Path') . '/thumb/' . $filename;
                    $thumbUploadSuccess = Storage::disk('s3')->put($image_thumb_path, $image_thumb);
                    if (!$thumbUploadSuccess) {
                        throw new \Exception('Failed to upload the thumbnail.');
                    }

                    MultiImage::create([
                        'publication_id' => $this->item->id,
                        'image' => $filename,
                    ]);

                } catch (\Exception $e) {
                    return session()->flash('error', ['Error: ' . $e->getMessage()]);
                }
            }
        }

        // Clear the images array
        $this->images = [];

        session()->flash('success', 'File saved successfully!');
    }

    public function render()
    {
        $multiImages = MultiImage::where('publication_id', $this->item->id)->latest()->get();
        return view('livewire.publication-image', [
            'multiImages' => $multiImages,
        ]);
    }
}
