<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function patients()
    {
        return $this->hasMany(Patient::class, 'area_id');
    }
}
