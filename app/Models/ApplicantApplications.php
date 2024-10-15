<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantApplications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'application_id',
        'pay_mode',
        'amount',
        'status'
    ];
}
