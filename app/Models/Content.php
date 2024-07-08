<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function setContentAttribute($value)
    // {
    //     $this->attributes['content'] = strip_tags($value, '<strong><em><a>'); // Allowed tags
    // }
}
