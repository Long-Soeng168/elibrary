<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author(){
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class, 'lecturer_id', 'id');
    }

    public function supervisor(){
        return $this->belongsTo(Supervisor::class, 'supervisor_id', 'id');
    }

    public function category(){
        return $this->belongsTo(ThesisCategory::class, 'thesis_category_id', 'id');
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    public function type(){
        return $this->belongsTo(ThesisType::class, 'thesis_type_id', 'id');
    }

    public function major(){
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    public function language(){
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
