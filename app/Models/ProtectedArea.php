<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtectedArea extends Model
{
    use HasFactory;

    protected $table = 'protected_area';

    protected $guarded = [];

    public function areas() {
        return $this->hasMany(Area::class, 'protected_area_id', 'id');
    }
}
