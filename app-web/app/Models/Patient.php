<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
