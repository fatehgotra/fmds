<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    use HasFactory;

    protected $table='application_statuses';

    protected $fillable = [
        'applicant_application_id',
        'status',
        'actioned_by',
        'actioner_id'
    ];

    public static function booted() {
        static::creating(function ($model) {
            $model->uuid = bin2hex(random_bytes(5));
        });
    }
}
