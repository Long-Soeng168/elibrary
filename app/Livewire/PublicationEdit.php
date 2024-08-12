<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Publication;
use App\Models\PublicationCategory;
use App\Models\PublicationSubCategory;
use App\Models\PublicationType;
use App\Models\Publisher;
use App\Models\Location;
use App\Models\Language;
use App\Models\Author;
use App\Models\Keyword;

use Image;
use Illuminate\Support\Facades\File;
use Storage;

class PublicationEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $image;
    public $pdf;

    public $publication_category_id = null;
    public $publication_sub_category_id = null;
    public $publication_type_id = null;
    public $publisher_id = null;
    public $location_id = null;
    public $language_id = null;
    public $author_id = null;

    public $name = null;
    public $pages_count = null;
    public $edition = null;
    public $link = null;
    public $isbn = null;
    public $year = null;
    public $description = null;

    public $keywords = [];

    public function mount($id)
    {
        $this->item = Publication::findOrFail($id);

        $this->publication_category_id = $this->item->publication_category_id;
        $this->publication_sub_category_id = $this->item->publication_sub_category_id;
        $this->publication_type_id = $this->item->publication_type_id;
        $this->publisher_id = $this->item->publisher_id;
        $this->location_id = $this->item->location_id;
        $this->language_id = $this->item->language_id;
        $this->author_id = $this->item->author_id;

        $this->name = $this->item->name;
        $this->pages_count = $this->item->pages_count;
        $this->edition = $this->item->edition;
        $this->link = $this->item->link;
        $this->isbn = $this->item->isbn;
        $this->year = $this->item->year;
        $this->description = $this->item->description;

        $this->keywords = explode(',', $this->item->keywords);
    }

    // ==========Add New Author============
    public $newAuthorName = null;
    public $newAuthorGender = null;

    public function saveNewAuthor()
    {
        try {
            $validated = $this->validate([
                'newAuthorName' => 'required|string|max:255|unique:authors,name',
            ]);

            Author::create([
                'name' => $this->newAuthorName,
                'gender' => $this->newAuthorGender,
            ]);

            session()->flash('success', 'Add New Author successfully!');

            $this->reset(['newAuthorName', 'newAuthorGender']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }

    // ==========Add New Keyword============
    public $newKeywordName = null;

    public function saveNewKeyword()
    {
        try {
            $validated = $this->validate([
                'newKeywordName' => 'required|string|max:255|unique:keywords,name',
            ]);

            Keyword::create([
                'name' => $this->newKeywordName,
            ]);

            session()->flash('success', 'Add New Keyword successfully!');

            $this->reset(['newKeywordName']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }


    // ==========Add New Category============
    public $newCategoryName = null;
    public $newCategoryNameKh = null;

    public function saveNewCategory()
    {
        try {
            $this->validate([
                'newCategoryName' => 'required|string|max:255|unique:publication_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            PublicationCategory::create([
                'name' => $this->newCategoryName,
                'name_kh' => $this->newCategoryNameKh,
            ]);

            session()->flash('success', 'Add New Category successfully!');

            $this->reset(['newCategoryName', 'newCategoryNameKh']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }


    // ==========Add New Sub-Category============
    public $newSubCategoryName = null;
    public $newSubCategoryNameKh = null;
    public $selectedCategoryId = null;

    public function saveNewSubCategory()
    {
        try {
            $this->validate([
                'newSubCategoryName' => 'required|string|max:255|unique:publication_sub_categories,name',
                'selectedCategoryId' => 'required|exists:publication_categories,id',
            ]);

            PublicationSubCategory::create([
                'name' => $this->newSubCategoryName,
                'name_kh' => $this->newSubCategoryNameKh,
                'publication_category_id' => $this->selectedCategoryId,
            ]);

            session()->flash('success', 'Add New Sub-Category successfully!');

            $this->reset(['newSubCategoryName', 'newSubCategoryNameKh', 'selectedCategoryId']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }

    // ==========Add New Type============
    public $newTypeName = null;
    public $newTypeNameKh = null;

    public function saveNewType()
    {
        try {
            $this->validate([
                'newTypeName' => 'required|string|max:255|unique:publication_types,name',
                // Add validation rules for 'newTypeNameKh' if needed
            ]);

            PublicationType::create([
                'name' => $this->newTypeName,
                'name_kh' => $this->newTypeNameKh,
            ]);

            session()->flash('success', 'Add New Type successfully!');

            $this->reset(['newTypeName', 'newTypeNameKh']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }

    // ==========Add New Publisher============
    public $newPublisherName = null;
    public $newPublisherGender = null;

    public function saveNewPublisher()
    {
        try {
            $this->validate([
                'newPublisherName' => 'required|string|max:255|unique:publishers,name',
                // Add validation rules for 'newPublisherGender' if needed
            ]);

            Publisher::create([
                'name' => $this->newPublisherName,
                'gender' => $this->newPublisherGender,
            ]);

            session()->flash('success', 'Add New Publisher successfully!');

            $this->reset(['newPublisherName', 'newPublisherGender']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }

    // ==========Add New Location============
    public $newLocationName = null;

    public function saveNewLocation()
    {
        try {
            $this->validate([
                'newLocationName' => 'required|string|max:255|unique:locations,name',
                // Add validation rules for 'newPublisherGender' if needed
            ]);

            Location::create([
                'name' => $this->newLocationName,
            ]);

            session()->flash('success', 'Add New Location successfully!');

            $this->reset(['newLocationName']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }

    // ==========Add New Type============
    public $newLanguageName = null;
    public $newLanguageNameKh = null;

    public function saveNewLanguage()
    {
        try {
            $this->validate([
                'newLanguageName' => 'required|string|max:255|unique:languages,name',
                // Add validation rules for 'newLanguageNameKh' if needed
            ]);

            Language::create([
                'name' => $this->newLanguageName,
                'name_kh' => $this->newLanguageNameKh,
            ]);

            session()->flash('success', 'Add New Language successfully!');

            $this->reset(['newLanguageName', 'newLanguageNameKh']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
    }



    public function updatedPublication_category_id()
    {
        $this->publication_sub_category_id = null;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    public function updatedPdf()
    {
        $this->validate([
            'pdf' => 'file|max:51200', // 2MB Max
        ]);

        session()->flash('success', 'PDF successfully uploaded!');
    }

    public function updated()
    {
        $this->dispatch('livewire:updated');
    }


    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'image' => 'nullable|image|max:2048',
            'pages_count' => 'nullable|integer|min:1',
            'year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'isbn' => 'nullable|string|max:30',
            'link' => 'nullable|string|max:255',
            'edition' => 'nullable|integer',
            'publication_category_id' => 'nullable',
            'publication_sub_category_id' => 'nullable',
            'publication_type_id' => 'nullable',
            'publisher_id' => 'nullable',
            'location_id' => 'nullable',
            'language_id' => 'nullable',
            'author_id' => 'nullable',
            'description' => 'nullable',
        ]);

        if (count($this->keywords) > 0) {
            $validated['keywords'] = implode(',', $this->keywords);
        } else {
            $validated['keywords'] = null;
        }

        if (!empty($this->image)) {
            try {
                $file = $this->image;
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

            } catch (\Exception $e) {
                return session()->flash('error', ['Error: ' . $e->getMessage()]);
            }
            $validated['image'] = $filename;
        }else {
            $validated['image'] = $this->item->image;
        }

        if (!empty($this->pdf)) {
            // $filename = time() . '_' . $this->pdf->getClientOriginalName();
            // $filename = time() . str()->random(10) . '.' . $this->pdf->getClientOriginalExtension();
            // $this->pdf->storeAs('publications', $filename, 'publicForPdf');
            // $validated['pdf'] = $filename;

            // $old_file = public_path('assets/pdf/publications/' . $this->item->pdf);
            // if (File::exists($old_file)) {
            //     File::delete($old_file);
            // }

            try {
                $file = $this->pdf;
                $filename = time() . str()->random(10) . '.' . $file->getClientOriginalExtension();
                $filePath = env('AWS_File_Path') . $filename;
                $uploadSuccess = Storage::disk('s3')->put($filePath, $file->get());
                if (!$uploadSuccess) {
                    throw new \Exception('Failed to upload the file to S3.');
                }
            } catch (\Exception $e) {
                session()->flash('error', ['Error: ' . $e->getMessage()]);
                return redirect()->back();
            }

            $validated['pdf'] = $filename;
        }else {
            $validated['pdf'] = $this->item->pdf;
        }

        $this->item->update($validated);

        return redirect()->route('admin.publications.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $categories = PublicationCategory::latest()->get();
        $subCategories = PublicationSubCategory::where('publication_category_id', $this->publication_category_id)->latest()->get();
        $types = PublicationType::latest()->get();
        $publishers = Publisher::latest()->get();
        $locations = Location::latest()->get();
        $languages = Language::latest()->get();
        $authors = Author::latest()->get();
        $allKeywords = Keyword::latest()->get();
// dd($allKeywords);
        // dump($this->selectedallKeywords);

        return view('livewire.publication-edit', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'types' => $types,
            'publishers' => $publishers,
            'locations' => $locations,
            'authors' => $authors,
            'languages' => $languages,
            'allKeywords' => $allKeywords,
        ]);
    }
}
