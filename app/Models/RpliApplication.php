<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpliApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "application_id",
        "surname",
        "forename",
        "othername",
        "profession",
        "tax_identification",
        "registration",
        "dob",
        "sex",
        "country_of_citizenship",
        "country_of_birth",
        "residential_address",
        "postal_address",
        "telephone",
        "work_phone",
        "mobile",
        "email",
        "next_of_kin",
        "kin_relationship",
        "kin_address",
        "kin_phone",
        "kin_email",
        "qualification_gained",
        "institute",
        "country",
        "date_commenced_program",
        "date_completed_program",
        "other_degree",
        "other_language_course",
        "disciplinary_date1",
        "disciplinary_country1",
        "disciplinary_outcome1",
        "disciplinary_date2",
        "disciplinary_country2",
        "disciplinary_outcome2",
        "disciplinary_date3",
        "disciplinary_country3",
        "disciplinary_outcome3",
        "medical_fitness",
        "medical_details",
        "indemnity",
        "indemnity_details",
        "criminal_conviction",
        "criminal_details",
        "business_interest",
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
