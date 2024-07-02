<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Journal;
use App\Models\JournalCategory as Category;
use App\Models\JournalType as Type;
use App\Models\Publisher;
use App\Models\Location;
use App\Models\Language;
use App\Models\Author;
use App\Models\Keyword;
use App\Models\JournalResourceLink;

use Image;
use Illuminate\Support\Facades\File;

class JournalEdit extends Component
{
    use WithFileUploads;

    // Add Resource Links
    public $resourceLinks = ['']; // Initialize with one empty link

    public function addResourceLink()
    {
        $this->dispatch('livewire:updated');
        // Check if the last link is filled
        if (!empty($this->resourceLinks[count($this->resourceLinks) - 1])) {
            $this->resourceLinks[] = '';
        } else {
            // Optionally, you can set a flash message or other feedback to the user
            session()->flash('error', ['Please fill in the current link before adding a new one.']);
        }
    }

    public function removeResourceLink($index)
    {
        $this->dispatch('livewire:updated');
        unset($this->resourceLinks[$index]);
        $this->resourceLinks = array_values($this->resourceLinks); // Reindex array
    }

    public $item;
    public $image;
    public $pdf;

    public $journal_category_id = null;
    public $journal_type_id = null;
    public $publisher_id = null;
    public $location_id = null;
    public $language_id = null;
    public $author_id = null;

    public $name = null;
    public $pages_count = null;
    public $barcode = null;
    public $volume = null;
    public $issue = null;
    public $link = null;
    public $isbn = null;
    public $inventory_number = null;
    public $published_date = null;
    public $description = null;
    public $short_description = null;
    public $doi = null;

    public $keywords = [];

    public function mount($id)
    {
        $this->item = Journal::findOrFail($id);

        $this->journal_category_id = $this->item->journal_category_id;
        $this->journal_sub_category_id = $this->item->journal_sub_category_id;
        $this->journal_type_id = $this->item->journal_type_id;
        $this->publisher_id = $this->item->publisher_id;
        $this->location_id = $this->item->location_id;
        $this->language_id = $this->item->language_id;
        $this->author_id = $this->item->author_id;

        $this->name = $this->item->name;
        $this->pages_count = $this->item->pages_count;
        $this->barcode = $this->item->barcode;
        $this->volume = $this->item->volume;
        $this->issue = $this->item->issue;
        $this->link = $this->item->link;
        $this->isbn = $this->item->isbn;
        $this->published_date = $this->item->published_date;
        $this->description = $this->item->description;
        $this->short_description = $this->item->short_description;
        $this->inventory_number = $this->item->inventory_number;

        $this->keywords = explode(',', $this->item->keywords);

        $links = JournalResourceLink::where('journal_id', $this->item->id)->get();
        $this->resourceLinks = $links->pluck('link')->toArray();
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
                'newCategoryName' => 'required|string|max:255|unique:journal_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            Category::create([
                'name' => $this->newCategoryName,
                'name_kh' => $this->newCategoryNameKh,
            ]);

            session()->flash('success', 'Add New Topic successfully!');

            $this->reset(['newCategoryName', 'newCategoryNameKh']);

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
                'newTypeName' => 'required|string|max:255|unique:journal_types,name',
                // Add validation rules for 'newTypeNameKh' if needed
            ]);

            Type::create([
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

    public function updated()
    {
        $this->dispatch('livewire:updated');
    }


    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'pages_count' => 'nullable|integer|min:1',
            'inventory_number' => 'nullable|integer',
            'isbn' => 'nullable|string|max:30',
            'link' => 'nullable|string|max:255',
            'barcode' => 'nullable|integer',
            'volume' => 'nullable|integer',
            'issue' => 'nullable|integer',
            'published_date' => 'nullable',
            'journal_category_id' => 'nullable|exists:journal_categories,id',
            'journal_type_id' => 'nullable|exists:journal_types,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            'location_id' => 'nullable|exists:locations,id',
            'language_id' => 'nullable|exists:languages,id',
            'author_id' => 'nullable|exists:authors,id',
            'description' => 'nullable',
            'short_description' => 'nullable',
            'doi' => 'nullable',
        ]);

        $validated['create_by_user_id'] = request()->user()->id;
        if (count($this->keywords) > 0) {
            $validated['keywords'] = implode(',', $this->keywords);
        } else {
            $validated['keywords'] = null;
        }

        // dd($validated);

        if(!empty($this->image)){
            $filename = time() . '_' . $this->image->getClientOriginalName();

            $image_path = public_path('assets/images/journals/'.$filename);
            $image_thumb_path = public_path('assets/images/journals/thumb/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400,null,function($resize){
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;

            $old_path = public_path('assets/images/journals/' . $this->item->image);
            $old_thumb_path = public_path('assets/images/journals/thumb/' . $this->item->image);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            if (File::exists($old_thumb_path)) {
                File::delete($old_thumb_path);
            }
        }

        if (!empty($this->pdf)) {
            $filename = time() . '_' . $this->pdf->getClientOriginalName();
            $this->pdf->storeAs('journals', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;

            $old_file = public_path('assets/pdf/journals/' . $this->item->pdf);
            if (File::exists($old_file)) {
                File::delete($old_file);
            }
        }

        // dd($validated);

        $this->item->update($validated);

        JournalResourceLink::where('journal_id', $this->item->id)->delete();
        if($this->resourceLinks > 0){
            foreach($this->resourceLinks as $link){
                if($link) {
                    JournalResourceLink::create([
                        'journal_id' => $this->item->id,
                        'link' => $link,
                    ]);
                }
            }
        }

        return redirect()->route('admin.journals.index')->with('success', 'Successfully uploaded!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        $categories = Category::latest()->get();
        $types = Type::latest()->get();
        $publishers = Publisher::latest()->get();
        $locations = Location::latest()->get();
        $languages = Language::latest()->get();
        $authors = Author::latest()->get();
        $allKeywords = Keyword::latest()->get();
// dd($allKeywords);
        // dump($this->selectedallKeywords);

        return view('livewire.journal-edit', [
            'categories' => $categories,
            'types' => $types,
            'publishers' => $publishers,
            'locations' => $locations,
            'authors' => $authors,
            'languages' => $languages,
            'allKeywords' => $allKeywords,
        ]);
    }
}
