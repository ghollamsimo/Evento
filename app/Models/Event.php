<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'localisation',
        'description',
        'image',
        'date',
        'capacity',
        'categorie_id',
        'organizer_id',
        'etat',
        'status',
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }

}
