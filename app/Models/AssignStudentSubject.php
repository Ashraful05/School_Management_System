<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudentSubject extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function studentClassName()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function subjectName()
    {
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }
}
