<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gmcrequest extends Model
{
    use HasFactory;
    protected $table = 'gmc_request';
    protected $fillable = [
        'transaction_no', 
        'student_no',
        'degree_program_id',
        'college_id',
        'contact_no',
        'purpose',   
        'payment_method',
        'official_receipt_no',             
    ];
}
