<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "application_id",
        "surname",
        "forename",
        "othername",
        "student_number",
        "profession",
        "residential_address",
        "postal_address",
        "telephone",
        "mobile",
        "email",
        "next_of_kin",
        "kin_relationship" ,
        "kin_address" ,
        "kin_phone" ,
        "kin_email",
        "reason",
        "institute" ,
        "program",
        "year",
        "education_date1",
        "qualification_gained1",
        "education_institution1",
        "education_date2",
        "qualification_gained2",
        "education_institution2",
        "education_date3" ,
        "qualification_gained3" ,
        "education_institution3" ,
        "education_date4" ,
        "qualification_gained4" ,
        "education_institution4" ,
        "education_date5" ,
        "qualification_gained5" ,
        "education_institution5" ,
        "other_acheivement",
        "medical_fitness",
        "medical_details",
        "criminal_conviction",
        "criminal_details" ,
        "applicant_signature",
        "applicant_declaration_date",
        "declare_name",
        "declare_place",
    ];

    public static function booted() {
        static::creating(function ($model) {
            $model->uuid = bin2hex(random_bytes(5));
        });
    }
}
