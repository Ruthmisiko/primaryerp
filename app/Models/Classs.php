<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    public $table = 'classses';

    public $fillable = [
        'name',
        'teachers',
        'students'   
    ];
    protected $casts = [
        
    ];

    public static array $rules = [
        
    ];
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
    
}
