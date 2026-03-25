<?php

namespace App\Models;

class Reviewer extends Model {
    protected $fillable = ['name', 'email', 'role', 'status'];
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}