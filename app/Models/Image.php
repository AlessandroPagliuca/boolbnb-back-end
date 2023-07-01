<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the inverse relationship with the apartment
    public function apartments()
    {
        return $this->belongsTo(Apartment::class);
        return $this->belongsTo(Apartment::class)->onDelete('cascade');

    }
}
