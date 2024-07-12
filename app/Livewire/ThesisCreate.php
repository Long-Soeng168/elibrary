<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Thesis;
use App\Models\ThesisCategory as Category;
use App\Models\ThesisType as Type;
use App\Models\Publisher;
use App\Models\Location;
use App\Models\Language;
use App\Models\Author;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Supervisor;
use App\Models\Keyword;
use App\Models\Major;
use App\Models\ThesisResourceLink;
use App\Models\ThesisJournalLink;

use Image;

class ThesisCreate extends Component
{
    use WithFileUploads;

    // Add Resource Links
    public $resourceLinks = ['']; // Initialize with one empty link

    public function addResourceLink()
    {
        $this->dispatch('livewire:updated');
        // Check if the last link is filled
        if (!empty($this->resourceLinks[count($this->resourceLinks) - 1]) || count($this->resourceLinks) < 1) {
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

    // Add Journal Links
    public $journalLinks = ['']; // Initialize with one empty link

    public function addJournalLink()
    {
        $this->dispatch('livewire:updated');
        // Check if the last link is filled
        if (!empty($this->journalLinks[count($this->journalLinks) - 1]) || count($this->journalLinks) < 1) {
            $this->journalLinks[] = '';
        } else {
            // Optionally, you can set a flash message or other feedback to the user
            session()->flash('error', ['Please fill in the current link before adding a new one.']);
        }
    }

    public function removeJournalLink($index)
    {
        unset($this->journalLinks[$index]);
        $this->journalLinks = array_values($this->journalLinks); // Reindex array
    }

    public $image;
    public $pdf;


    public $thesis_category_id = null;
    public $thesis_type_id = null;
    public $publisher_id = null;
    public $location_id = null;
    public $language_id = null;
    public $author_id = null;
    public $student_id = null;
    public $lecturer_id = null;
    public $supervisor_id = null;
    public $major_id = null;

    public $name = null;
    public $pages_count = null;
    public $barcode = null;
    public $link = null;
    public $isbn = null;
    public $inventory_number = null;
    public $published_date = null;
    public $description = null;
    public $short_description = null;

    public $keywords = [];

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

     // ==========Add New Student============
     public $newStudentName = null;
     public $newStudentGender = null;

     public function saveNewStudent()
     {
         try {
             $validated = $this->validate([
                 'newStudentName' => 'required|string|max:255|unique:students,name',
             ]);

             Student::create([
                 'name' => $this->newStudentName,
                 'gender' => $this->newStudentGender,
             ]);

             session()->flash('success', 'Add New Student successfully!');

             $this->reset(['newStudentName', 'newStudentGender']);

         } catch (\Illuminate\Validation\ValidationException $e) {
             session()->flash('error', $e->validator->errors()->all());
         }
     }

     // ==========Add New Lecturer============
     public $newLecturerName = null;
     public $newLecturerGender = null;

     public function saveNewLecturer()
     {
         try {
             $validated = $this->validate([
                 'newLecturerName' => 'required|string|max:255|unique:lecturers,name',
             ]);

             Lecturer::create([
                 'name' => $this->newLecturerName,
                 'gender' => $this->newLecturerGender,
             ]);

             session()->flash('success', 'Add New Lecturer successfully!');

             $this->reset(['newLecturerName', 'newLecturerGender']);

         } catch (\Illuminate\Validation\ValidationException $e) {
             session()->flash('error', $e->validator->errors()->all());
         }
     }

     // ==========Add New Author============
    public $newSupervisorName = null;
    public $newSupervisorGender = null;

    public function saveNewSupervisor()
    {
        try {
            $validated = $this->validate([
                'newSupervisorName' => 'required|string|max:255|unique:supervisors,name',
            ]);

            Supervisor::create([
                'name' => $this->newSupervisorName,
                'gender' => $this->newSupervisorGender,
            ]);

            session()->flash('success', 'Add New Supervisor successfully!');

            $this->reset(['newSupervisorName', 'newSupervisorGender']);

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
                'newCategoryName' => 'required|string|max:255|unique:thesis_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            Category::create([
                'name' => $this->newCategoryName,
                'name_kh' => $this->newCategoryNameKh,
            ]);

            session()->flash('success', 'Add New Category successfully!');

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
                'newTypeName' => 'required|string|max:255|unique:thesis_types,name',
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

    // ==========Add New Type============
    public $newMajorName = null;
    public $newMajorNameKh = null;

    public function saveNewMajor()
    {
        try {
            $this->validate([
                'newMajorName' => 'required|string|max:255|unique:majors,name',
                // Add validation rules for 'newMajorNameKh' if needed
            ]);

            Major::create([
                'name' => $this->newMajorName,
                'name_kh' => $this->newMajorNameKh,
            ]);

            session()->flash('success', 'Add New Major successfully!');

            $this->reset(['newMajorName', 'newMajorNameKh']);

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
            'pdf' => 'file|max:20480', // 2MB Max
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
            'image' => 'required|image|max:2048',
            'pdf' => 'required|file|mimes:pdf|max:20480',
            'pages_count' => 'nullable|integer|min:1',
            'inventory_number' => 'nullable|integer',
            'isbn' => 'nullable|string|max:30',
            'link' => 'nullable|string|max:255',
            'barcode' => 'nullable|integer',
            'published_date' => 'nullable',
            'thesis_category_id' => 'nullable|exists:thesis_categories,id',
            'thesis_type_id' => 'required|exists:thesis_types,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            'location_id' => 'nullable|exists:locations,id',
            'language_id' => 'nullable|exists:languages,id',
            'author_id' => 'nullable|exists:authors,id',
            'student_id' => 'nullable|exists:students,id',
            'lecturer_id' => 'nullable|exists:lecturers,id',
            'supervisor_id' => 'nullable|exists:supervisors,id',
            'major_id' => 'nullable|exists:majors,id',
            'description' => 'nullable',
            'short_description' => 'nullable',
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

            $image_path = public_path('assets/images/theses/'.$filename);
            $image_thumb_path = public_path('assets/images/theses/thumb/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400,null,function($resize){
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;
        }

        if (!empty($this->pdf)) {
            $filename = time() . '_' . $this->pdf->getClientOriginalName();
            $this->pdf->storeAs('theses', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;
        }

        // dd($validated);

        $createdThesis = Thesis::create($validated);

        if($this->resourceLinks > 0){
            foreach($this->resourceLinks as $link){
                if($link) {
                    ThesisResourceLink::create([
                        'thesis_id' => $createdThesis->id,
                        'link' => $link,
                    ]);
                }
            }
        }

        if($this->journalLinks > 0){
            foreach($this->journalLinks as $link){
                if($link) {
                    ThesisJournalLink::create([
                        'thesis_id' => $createdThesis->id,
                        'link' => $link,
                    ]);
                }
            }
        }

        return redirect()->route('admin.theses.index')->with('success', 'Successfully uploaded!');

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
        $students = Student::latest()->get();
        $lecturers = Lecturer::latest()->get();
        $supervisors = Supervisor::latest()->get();
        $allKeywords = Keyword::latest()->get();
        $majors = major::latest()->get();
        // dd($allKeywords);
        // dump($this->selectedallKeywords);

        return view('livewire.thesis-create', [
            'categories' => $categories,
            'types' => $types,
            'publishers' => $publishers,
            'locations' => $locations,
            'authors' => $authors,
            'students' => $students,
            'lecturers' => $lecturers,
            'supervisors' => $supervisors,
            'languages' => $languages,
            'allKeywords' => $allKeywords,
            'majors' => $majors,
        ]);
    }
}
