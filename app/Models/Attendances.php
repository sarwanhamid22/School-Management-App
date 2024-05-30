<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'attendance_date',
        'attendance_status',
    ];

    protected $casts = [
        'attendance_date' => 'date',
    ];
    
};
