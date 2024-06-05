<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'college',
        'course',
        'year_and_block',
        'date_and_time',
        'offense',
        'reported_by',
        'office',
        'contact_number',
        'acknowledgement',
        'student_signature',
        'student_contact_number',
    ];

    protected $casts = [
        'date_and_time' => 'datetime',
        'offense' => 'array', // Cast offense as an array
        'acknowledgement' => 'boolean',
    ];
}
