<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function discount()
    {
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function studentYear()
    {
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }
    public function classShift()
    {
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }
    public function FeeCategory()
    {
        return $this->belongsTo(StudentFeeCategory::class,'fee_category_id','id');
    }


}
