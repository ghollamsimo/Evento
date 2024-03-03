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
        'categorie_id'
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
