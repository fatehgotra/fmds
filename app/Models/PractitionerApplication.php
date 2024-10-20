<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PractitionerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "application_id",
        "wish_practice",
        "surname",
        "forename",
        "othername",
        "tax_identification",
        "registration",
        "dob",
        "sex",
        "country_of_citizenship",
        "residential_address",
        "postal_address",
        "telephone",
        "work_phone",
        "mobile",
        "email",
        "passport_number",
        "edp_number",
        "language_spoken",
        "fnfp_number",
        "next_of_kin",
        "kin_relationship",
        "kin_address",
        "kin_phone",
        "kin_email",
        "date_of_entry1",
        "regestering_authority1",
        "name_of_nation1",
        "valid_until1",
        "general_specialist1",
        "date_of_entry2",
        "regestering_authority2",
        "name_of_nation2",
        "valid_until2",
        "general_specialist2",
        "date_of_entry3",
        "regestering_authority3",
        "name_of_nation3",
        "valid_until3",
        "general_specialist3",
        "date_of_entry4",
        "regestering_authority4",
        "name_of_nation4",
        "valid_until4",
        "general_specialist4",
        "date_of_entry5",
        "regestering_authority5",
        "name_of_nation5",
        "valid_until5",
        "general_specialist5",
        "qualification_gained",
        "institute",
        "year_length_program",
        "clinical_instruction",
        "language_of_course",
        "conditional",
        "vocational_text",
        "temporary_from",
        "temporary_to",
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
