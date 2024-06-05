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

    public static function generateTransactionNo()
    {
        $year = now()->format('Y');
        $month = now()->format('m');
        $latestTransaction = self::where('transaction_no', 'like', $year . $month . '%')
                                 ->orderBy('transaction_no', 'desc')
                                 ->first();

        $lastNo = $latestTransaction ? intval(substr($latestTransaction->transaction_no, 6)) : 0;
        $nextNo = str_pad($lastNo + 1, 4, '0', STR_PAD_LEFT);

        return $year . $month . $nextNo;
    }
}
