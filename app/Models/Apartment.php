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
        return $this->hasMany(Message::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
        return $this->hasMany(Apartment::class)->onDelete('cascade');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
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
