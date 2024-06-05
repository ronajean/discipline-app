<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaintinbox extends Model
{
    use HasFactory;

    protected $table = 'complaints_inbox';
    protected $fillable = ['student_no', 'first_name', 'last_name','middle_name','apprehension_date','apprehension_time', 'location', 'description'];
}
