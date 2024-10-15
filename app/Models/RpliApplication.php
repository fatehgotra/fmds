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
        "disciplinary_date",
        "disciplinary_country",
        "disciplinary_outcome",
        "medical_fitness",
        "medical_details",
        "indemnity",
        "indemnity_details",
        "criminal_conviction",
        "criminal_details",
        "business_interest",
        "declare_name",
        "declare_place",
    ];
}
