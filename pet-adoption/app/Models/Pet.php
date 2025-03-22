<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it follows Laravel's naming convention)
    protected $table = 'pets';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'species',
        'other_species',
        'breed',
        'age',
        'color_markings',
        'sex',
        'health_status',
        'neutered_spayed',
        'adoption_status',
        'date_added',
        'pet_image',
        'description',
    ];

    // Cast the date_added field to a Carbon instance
    protected $casts = [
        'date_added' => 'date',
    ];
}