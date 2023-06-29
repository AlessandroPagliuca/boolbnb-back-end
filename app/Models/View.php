<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;


    protected $table = 'views';

    protected $guarded = [];

    // Define the inverse relationship with the apartment
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}