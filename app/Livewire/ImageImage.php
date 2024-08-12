<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ImageImage as MultiImage;
use App\Models\Image;
use Livewire\WithFileUploads;
use Image as CompressImage;
use Illuminate\Support\Facades\File;
use Storage;

class ImageImage extends Component
{
    use WithFileUploads;

    public $images = []; // Updated to hold multiple images
    public $item;

    public function mount(Image $item)
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
        // $imagePathThumb = public_path('assets/images/images/thumb/' . $image->image);
        // $imagePath = public_path('assets/images/images/' . $image->image);

        // Delete the image file from the filesystem
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
        $filePath = public_path('assets/images/images');
        $fileThumbPath = public_path('assets/images/images/thumb');
        if (!File::exists($filePath)) {
            File::makeDirectory($filePath, 0755, true);
        }
        if (!File::exists($fileThumbPath)) {
            File::makeDirectory($fileThumbPath, 0755, true);
        }

        foreach ($this->images as $image) {
            if (!empty($image)) {
                // $filename = time() . '_' . $image->getClientOriginalName();
                // $filename = time() . str()->random(10) . '.' . $image->getClientOriginalExtension();

                // $imagePath = $filePath . '/' . $filename;
                // $imageThumbPath = $fileThumbPath . '/' . $filename;

                // try {
                //     $imageUpload = CompressImage::make($image->getRealPath())->save($imagePath);
                //     $imageUpload->resize(400, null, function ($resize) {
                //         $resize->aspectRatio();
                //     })->save($imageThumbPath);

                //     MultiImage::create([
                //         'image_id' => $this->item->id,
                //         'image' => $filename,
                //     ]);
                // } catch (\Exception $e) {
                //     session()->flash('error', ['An error occurred while saving the image.']);
                //     return;
                // }

                try {
                    $file = $image;
                    $filename = time() . str()->random(10) . '.' . $file->getClientOriginalExtension();
                    // Process and upload the original image to S3
                    // dd($this->image->getRealPath()) ;
                    $image = CompressImage::make($file->getRealPath())->encode();
                    $image_path =  env('AWS_File_Path') . '/' . $filename;
                    $uploadSuccess = Storage::disk('s3')->put($image_path, $image);
                    if (!$uploadSuccess) {
                        throw new \Exception('Failed to upload the original image.');
                    }
                    // Process and upload the thumbnail to S3
                    $image_thumb = CompressImage::make($file->getRealPath())
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
                        'image_id' => $this->item->id,
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
        $multiImages = MultiImage::where('image_id', $this->item->id)->latest()->get();
        return view('livewire.image-image', [
            'multiImages' => $multiImages,
        ]);
    }
}
