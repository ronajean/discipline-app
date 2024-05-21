<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\College;
class Student extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'first_name', 'last_name', 'middle_name', 'college_id', 'course_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
