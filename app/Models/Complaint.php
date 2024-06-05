<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;



    protected $fillable = [
        'complainant_id',
        'complainee_id',
        'nature_and_case',
        'submission_date',
    ];

    protected $casts = [
        'submission_date' => 'datetime',
    ];
}
