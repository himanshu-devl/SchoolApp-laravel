<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name'];

    public function standards()
    {
        return $this->belongsToMany(Standard::class, 'standard_student');
        
    }
}
