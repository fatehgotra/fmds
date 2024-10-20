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
        Schema::create('rpli_applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger("application_id");
            $table->string("surname")->nullable();
            $table->string("forename")->nullable();
            $table->string("othername")->nullable();
            $table->string("profession")->nullable();
            $table->string("tax_identification")->nullable();
            $table->string("registration")->nullable();
            $table->string("dob")->nullable();
            $table->string("sex")->nullable();
            $table->string("country_of_citizenship")->nullable();
            $table->string("country_of_birth")->nullable();
            $table->longText("residential_address")->nullable();
            $table->longText("postal_address")->nullable();
            $table->string("telephone")->nullable();
            $table->string("work_phone")->nullable();
            $table->string("mobile")->nullable();
            $table->string("email")->nullable();
            $table->string("next_of_kin")->nullable();
            $table->string("kin_relationship")->nullable();
            $table->string("kin_address")->nullable();
            $table->string("kin_phone")->nullable();
            $table->string("kin_email")->nullable();
            $table->string("qualification_gained")->nullable();
            $table->string("institute")->nullable();
            $table->string("country")->nullable();
            $table->string("date_commenced_program")->nullable();
            $table->string("date_completed_program")->nullable();
            $table->string("other_degree")->nullable();
            $table->string("other_language_course")->nullable();

             $table->string("disciplinary_date1")->nullable();
             $table->string("disciplinary_country1")->nullable();
             $table->string("disciplinary_outcome1")->nullable();
             $table->string("disciplinary_date2")->nullable();
             $table->string("disciplinary_country2")->nullable();
             $table->string("disciplinary_outcome2")->nullable();
             $table->string("disciplinary_date3")->nullable();
             $table->string("disciplinary_country3")->nullable();
             $table->string("disciplinary_outcome3")->nullable();

            $table->string("disciplinary_date")->nullable();
            $table->string("disciplinary_country")->nullable();
            $table->string("disciplinary_outcome")->nullable();
            $table->string("medical_fitness")->nullable();
            $table->longText("medical_details")->nullable();
            $table->string("indemnity")->nullable();
            $table->longText("indemnity_details")->nullable();
            $table->string("criminal_conviction")->nullable();
            $table->longText("criminal_details")->nullable();
            $table->string("business_interest")->nullable();
            $table->longText("applicant_signature")->nullable();
            $table->string("applicant_declaration_date", 100)->nullable();
            $table->string("declare_name")->nullable();
            $table->string("declare_place")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpli_applications');
    }
};
