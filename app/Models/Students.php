<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'birth_date',
        'address',
        'phone_number',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}
