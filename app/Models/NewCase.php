<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCase extends Model
{
    use HasFactory;
    protected $table = 'new_cases';

    protected $fillable = [
        'student_id',
        'student_name',
        'year',
        'block',
        'date_and_time',
        'offense',
        'description',
    ];
}
