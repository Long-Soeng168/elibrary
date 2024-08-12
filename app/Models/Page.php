<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $guarded = [];

    public function protected_area() {
        return $this->belongsTo(ProtectedArea::class, 'protected_area_id', 'id');
    }

    public function area() {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

}
