<?php

namespace App\Models;

class Submission extends Model {
    protected $fillable = ['title', 'abstract', 'author_name', 'author_email', 'type', 'status', 'deadline', 'qr_code'];
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}