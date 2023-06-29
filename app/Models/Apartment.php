<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function services()
    {
        return $this->belongsToMany(Services::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function views() // Funzione di richiamo Framework Awssat per gestione visite
    {
        return $this->hasMany(View::class);
    }

}


// use HasFactory;
// protected $guarded = [];
// public function type(): BelongsTo
// {
//     return $this->belongsTo(Type::class);
// }
// public function tags(): BelongsToMany
// {
//     return $this->belongsToMany(Tag::class);
// }
