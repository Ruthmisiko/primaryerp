<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $table = 'results';
    
        public $fillable = [
            'name',           
            'kiswahili',
            'English',
            'Mathematics',
            'CRE',
            'Homescience',
            'class'
        ];
    
        protected $casts = [
            
        ];
    
        public static array $rules = [
            
        ];
}
