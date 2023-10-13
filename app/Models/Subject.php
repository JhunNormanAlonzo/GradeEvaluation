<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prerequisites()
    {
        return $this->belongsToMany(Subject::class, 'subject_prerequisites', 'subject_id', 'prerequisite_id');
    }

    public function curriculumns()
    {
        return $this->belongsToMany(Curriculumn::class, 'curriculumn_subjects', 'subject_id', 'curriculumn_id');
    }
}
