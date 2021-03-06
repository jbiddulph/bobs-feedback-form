<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullName', 'postCode', 'phoneNumber', 'jobNumber', 'feedback', 'rating', 'status'
    ];


    public function getjobNumberAttribute($val)
    {
        return 'JC-' . $val;
    }
}
