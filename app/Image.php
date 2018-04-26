<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'area_id', 'photo_name', 'photo_cap',
    ];
}
