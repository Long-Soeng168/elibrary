<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $guarded = [];

    public function protected_area() {
        return $this->belongsTo(ProtectedArea::class, 'protected_area_id', 'id');
    }

    public function pages() {
        return $this->hasMany(Page::class, 'area_id', 'id');
    }

}
