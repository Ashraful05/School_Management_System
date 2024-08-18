<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assignSubjectName()
    {
        return $this->belongsTo(AssignStudent::class,'assign_subject_id','id');
    }
    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }


}
