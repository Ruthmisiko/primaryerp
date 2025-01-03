<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model

    {
        public $table = 'exams';
    
        public $fillable = [
            'name',           
            'category',
            'year',
        ];
    
        protected $casts = [
            
        ];
    
        public static array $rules = [
            
        ];
          
            
    }

