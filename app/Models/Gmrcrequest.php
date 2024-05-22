<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gmrcrequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_request',
        'student_number',
        'student_name',
        'contact_number',
        'purpose',
    ];
}
