<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;

class Students extends Authenticatable
{
    use HasFactory, Notifiable;

    // Set guard untuk autentikasi
    protected $guard = 'student';

    // Tentukan field yang dapat diisi
    protected $fillable = [
        'name',
        'student_id',
        'class',
        'birth_date',
        'address',
        'phone_number',
        'email',
        'password',
        'photo',
    ];

    // Tentukan field yang harus disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tentukan casting untuk field tertentu
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date',
    ];

    // Relasi dengan model Attendance
    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }

    // Relasi dengan model Grade
    public function grades()
    {
        return $this->hasMany(Grades::class);
    }
}
