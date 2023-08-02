<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $table = 'standards';
    protected $fillable = ['standard'];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'standard_subject');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'standard_student');
    }
}
