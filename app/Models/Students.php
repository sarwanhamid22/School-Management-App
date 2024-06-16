<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grades;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'student_id',
        'class',
        'birth_date',
        'address',
        'phone_number',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }

    public function grades()
    {
        return $this->hasMany(Grades::class);
    }
}
