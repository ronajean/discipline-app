<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gmcrequest extends Model
{
    use HasFactory;

    protected $table = 'gmc_request'; // Ensure this matches your table name

    protected $fillable = [
        'transaction_no', 
        'student_no', 
        'degree_program_id', 
        'college_id', 
        'contact_no', 
        'purpose', 
        'request_status', 
        'payment_date', 
        'payment_method', 
        'official_receipt_no', 
        'reference_no', 
        'gcash_receipt', 
        'card_no', 
        'card_expiry', 
        'card_cvv', 
        'claim_date', 
        'student_signature', 
        'request_date'
    ];
}