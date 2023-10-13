<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculumn extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'curriculumn_subjects', 'curriculumn_id', 'subject_id');
    }
}
