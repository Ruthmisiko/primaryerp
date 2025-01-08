<?php

namespace App\Models;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    public $table = 'classses';

    public $fillable = [
        'name',
        'teachers',
        'students',
    ];
    protected $casts = [
        
    ];

    public static array $rules = [
        
    ];
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id'); // Ensure 'class_id' is the foreign key in the 'students' table
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teachers');
    }
    public function results()
    {
        return $this->hasMany(Result::class, 'class_id'); // Ensure 'class_id' is the foreign key in the 'students' table
    }
}
