<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arr_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("application_id");
            $table->string("wish_practice",10)->nullable();
            $table->string("surname",50)->nullable();
            $table->string("forename",50)->nullable();
            $table->string("othername",50)->nullable();
            $table->string("registration",30)->nullable();
            $table->string("tax_identification",30)->nullable();
            $table->string("residential_address",100)->nullable();
            $table->string("postal_address",100)->nullable();
            $table->string("telephone",20)->nullable();
            $table->string("mobile",20)->nullable();
            $table->string("email",50)->nullable();
            $table->string("next_of_kin",30)->nullable();
            $table->string("kin_relationship",50)->nullable();
            $table->string("kin_address",100)->nullable();
            $table->string("kin_phone",30)->nullable();
            $table->string("kin_email",50)->nullable();
            $table->string("practice_names",200)->nullable();
            $table->string("employment_type",100)->nullable();
            $table->string("employment_positions",100)->nullable();
            $table->string("employment_address",100)->nullable();
            $table->string("years_of_service",50)->nullable();
            $table->string("edp",100)->nullable();
            $table->string("registration_categories",100)->nullable();
            $table->string("vocational_medical_text",100)->nullable();
            $table->string("medical_practitioner",100)->nullable();
            $table->string("dental_practitioner",100)->nullable();
            $table->string("vocational_dental_text",100)->nullable();
            $table->string("py_date1",100)->nullable();
            $table->string("py_loc1",100)->nullable();
            $table->string("py_position1",100)->nullable();
            $table->string("py_date2",100)->nullable();
            $table->string("py_loc2",100)->nullable();
            $table->string("py_position2",100)->nullable();
            $table->string("py_date3",100)->nullable();
            $table->string("py_loc3",100)->nullable();
            $table->string("py_position3",100)->nullable();
            $table->string("other_degree",100)->nullable();
            $table->string("other_language_course",100)->nullable();
            $table->string("disciplinary_date1",100)->nullable();
            $table->string("disciplinary_country1",100)->nullable();
            $table->string("disciplinary_outcome1",100)->nullable();
            $table->string("disciplinary_date2",100)->nullable();
            $table->string("disciplinary_country2",100)->nullable();
            $table->string("disciplinary_outcome2",100)->nullable();
            $table->string("disciplinary_date3",100)->nullable();
            $table->string("disciplinary_country3",100)->nullable();
            $table->string("disciplinary_outcome3",100)->nullable();
            $table->string("medical_fitness",100)->nullable();
            $table->string("medical_details",100)->nullable();
            $table->string("profesional_date1",100)->nullable();
            $table->string("profesional_activity1",100)->nullable();
            $table->string("profesional_hour1",100)->nullable();
            $table->string("profesional_date2",100)->nullable();
            $table->string("profesional_activity2",100)->nullable();
            $table->string("profesional_hour2",100)->nullable();
            $table->string("profesional_date3",100)->nullable();
            $table->string("profesional_activity3",100)->nullable();
            $table->string("profesional_hour3",100)->nullable();
            $table->string("indemnity",100)->nullable();
            $table->string("indemnity_details",100)->nullable();
            $table->string("criminal_conviction",100)->nullable();
            $table->string("criminal_details",100)->nullable();
            $table->string("business_interest",100)->nullable();
            $table->longText("applicant_signature")->nullable();
            $table->string("applicant_declaration_date",100)->nullable();
            $table->string("declare_name",100)->nullable();
            $table->string("declare_place",100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arr_applications');
    }
};
