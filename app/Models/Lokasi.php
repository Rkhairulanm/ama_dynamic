<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function berlangganans()
    {
        return $this->hasMany(Berlangganan::class);
    }
}
