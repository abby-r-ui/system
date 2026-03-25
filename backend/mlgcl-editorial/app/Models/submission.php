<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
        
        protected $fillable = [
            'title', 'abstract', 'author_name', 'author_email', 
            'type', 'status', 'deadline', 'qr_code'
        ];
                                    
        protected $casts = [
            'deadline' => 'date',
        ];
}