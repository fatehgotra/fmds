<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "application_id",
        "wish_practice",
        "surname",
        "forename",
        "othername",
        "registration",
        "tax_identification",
        "residential_address",
        "postal_address",
        "telephone",
        "mobile",
        "email",
        "next_of_kin",
        "kin_relationship",
        "kin_address",
        "kin_phone",
        "kin_email",
        "practice_names",
        "employment_type",
        "employment_positions",
        "employment_address",
        "years_of_service",
        "edp",
        "registration_categories",
        "vocational_medical_text",
        "medical_practitioner",
        "dental_practitioner",
        "vocational_dental_text",
        "py_date1",
        "py_loc1",
        "py_position1",
        "py_date2",
        "py_loc2",
        "py_position2",
        "py_date3",
        "py_loc3",
        "py_position3",
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
        "profesional_date1",
        "profesional_activity1",
        "profesional_hour1",
        "profesional_date2",
        "profesional_activity2",
        "profesional_hour2",
        "profesional_date3",
        "profesional_activity3",
        "profesional_hour3",
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
