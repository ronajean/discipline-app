<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Complainant extends Model
{
    use HasFactory;
    protected $table = 'complainant'; // Specify the correct table name
    protected $primaryKey = 'complainant_id';

    public function user()
    {
       
        return $this->belongsTo(Complainant::class, 'complainant_id');
    }
}
