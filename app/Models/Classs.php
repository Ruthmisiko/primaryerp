<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    public $table = 'classses';

    public $fillable = [
        'name',
        'teacher',
        'students'   
    ];
    protected $casts = [
        
    ];

    public static array $rules = [
        
    ];

    
}
