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
        'applied_id',
        'pay_mode',
        'payment_id',
        'amount',
        'status'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = bin2hex(random_bytes(5));
        });
    }

    public function data()
    {
        $aid = $this->application_id;
        switch ($aid) {
            case ($aid == 1):
                return $this->belongsTo(RpliApplication::class, 'applied_id', 'id');
                break;
            case ($aid == 2):
                return $this->belongsTo(ArrApplication::class, 'applied_id', 'id');
                break;
            case ($aid == 3):
                return $this->belongsTo(SarApplication::class, 'applied_id', 'id');
                break;
            case ($aid == 4):
                return $this->belongsTo(PractitionerApplication::class, 'applied_id', 'id');
                break;
            default:
        }
    }

    public function application(){
        return $this->belongsTo(Applications::class,'application_id','id'); 
    }

    public function statues(){
        return $this->hasMany(ApplicationStatus::class,'applicant_application_id','id'); 
    }
}
