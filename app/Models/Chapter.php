<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';
    protected $fillable = ['chapter'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_chapter');
    }

}
