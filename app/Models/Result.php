<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $table = 'results';
    
        public $fillable = [
            'name', 
            'exam_id',          
            'kiswahili',
            'English',
            'Mathematics',
            'CRE',
            'Homescience',
            'exam_id',
            'class_id',
                      
        ];
    
        protected $casts = [
            
        ];
    
        public static array $rules = [
            
        ];
        public function exam()
            {
                return $this->belongsTo(Exam::class, 'exam_id');
            }
        public function class(){
            return $this->belongsTo(classs::class, 'class_id');
        }
}
