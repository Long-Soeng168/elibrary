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

use Image;

class PublicationCreate extends Component
{
    use WithFileUploads;

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
    public $isbn = null;
    public $year = null;
    public $description = null;

    // ==========Add New Author============
    public $newAuthorName = null;
    public $newAuthorGender = null;

    public function saveNewAuthor() {
        $this->validate([
            'newAuthorName' => 'required|string|max:255|unique:authors,name',
        ]);
        Author::create([
            'name' => $this->newAuthorName,
            'gender' => $this->newAuthorGender,
        ]);

        session()->flash('success', 'Add New Author successfully!');

        $this->reset(['newAuthorName', 'newAuthorGender']);
    }

    // ==========Add New Category============
    public $newCategoryName = null;
    public $newCategoryNameKh = null;

    public function saveNewCategory() {
        $this->validate([
            'newCategoryName' => 'required|string|max:255|unique:publication_categories,name',
        ]);
        PublicationCategory::create([
            'name' => $this->newCategoryName,
            'name_kh' => $this->newCategoryNameKh,
        ]);

        session()->flash('success', 'Add New Category successfully!');

        $this->reset(['newCategoryName', 'newCategoryNameKh']);
    }

    // ==========Add New Author============
    public $newSubCategoryName = null;
    public $newSubCategoryNameKh = null;
    public $selectedCategoryId = null;

    public function saveNewSubCategory() {
        $this->validate([
            'newSubCategoryName' => 'required|string|max:255|unique:publication_categories,name',
            'selectedCategoryId' => 'nullable|exists:publication_categories,id',
        ]);
        PublicationSubCategory::create([
            'name' => $this->newSubCategoryName,
            'name_kh' => $this->newSubCategoryNameKh,
            'publication_category_id' => $this->selectedCategoryId,
        ]);

        session()->flash('success', 'Add New Sub-Category successfully!');

        $this->reset(['newSubCategoryName', 'newSubCategoryNameKh', 'selectedCategoryId']);
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
            'pdf' => 'file|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'PDF successfully uploaded!');
    }

    public function save()
    {

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'pdf' => 'required|file|mimes:pdf|max:2048',
            'pages_count' => 'nullable|integer|min:1',
            'year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'isbn' => 'nullable|string|max:30',
            'publication_category_id' => 'nullable|exists:publication_categories,id',
            'publication_sub_category_id' => 'nullable|exists:publication_sub_categories,id',
            'publication_type_id' => 'nullable|exists:publication_types,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            'location_id' => 'nullable|exists:locations,id',
            'language_id' => 'nullable|exists:languages,id',
            'author_id' => 'nullable|exists:authors,id',
            'description' => 'nullable',
        ]);

        $validated['create_by_user_id'] = request()->user()->id;

        // dd($validated);

        if(!empty($this->image)){
            $filename = time() . '_' . $this->image->getClientOriginalName();

            $image_path = public_path('assets/images/publications/'.$filename);
            $image_thumb_path = public_path('assets/images/publications/thumb/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400,null,function($resize){
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;
        }

        if (!empty($this->pdf)) {
            $filename = time() . '_' . $this->pdf->getClientOriginalName();
            $this->pdf->storeAs('publications', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;
        }

        $createdPublication = Publication::create($validated);

        // dd($createdPublication);
        return redirect()->route('admin.publications.index')->with('success', 'Successfully uploaded!');

        // session()->flash('message', 'Image successfully uploaded!');
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

        return view('livewire.publication-create', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'types' => $types,
            'publishers' => $publishers,
            'locations' => $locations,
            'authors' => $authors,
            'languages' => $languages,
        ]);
    }
}
