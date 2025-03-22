<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'current_address',
        'purok_street',
        'barangay',
        'city_province',
        'email',
        'phone_number',
        'age',
        'gender',
        'user_id',
        'pet_name',
        'pet_id',
        'breed',
        'color',
        'pet_age',
    ];
}
