<?php

namespace App\Models;
use App\Models\Classs;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'students';

    public $fillable = [
        'name',
        'class_id',
        'parent',
        'age',

    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        
    ];
    public function class()
{
    return $this->belongsTo(Classs::class, 'class_id');
}

        
}
