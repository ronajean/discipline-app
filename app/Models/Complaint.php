<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $table = 'complaints_inbox';
    protected $fillable = ['student_no', 'first_name', 'last_name','middle_name','apprehension_date','apprehension_time', 'location', 'description'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complainant()
    {
        return $this->belongsTo(Complainant::class);
    }
}
