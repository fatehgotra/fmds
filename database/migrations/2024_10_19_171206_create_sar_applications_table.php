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
        Schema::create('sar_applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("application_id");
            $table->string("surname", 100)->nullable();
            $table->string("forename")->nullable();
            $table->string("othername", 100)->nullable();
            $table->string("student_number", 100)->nullable();
            $table->string("profession", 100)->nullable();
            $table->string("residential_address", 100)->nullable();
            $table->string("postal_address", 100)->nullable();
            $table->string("telephone", 100)->nullable();
            $table->string("mobile", 100)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("next_of_kin", 100)->nullable();
            $table->string("kin_relationship", 100)->nullable();
            $table->string("kin_address", 100)->nullable();
            $table->string("kin_phone", 100)->nullable();
            $table->string("kin_email", 100)->nullable();
            $table->string("reason", 100)->nullable();
            $table->string("institute", 100)->nullable();
            $table->string("program", 100)->nullable();
            $table->string("year", 100)->nullable();
            $table->string("education_date1", 100)->nullable();
            $table->string("qualification_gained1", 100)->nullable();
            $table->string("education_institution1", 100)->nullable();
            $table->string("education_date2", 100)->nullable();
            $table->string("qualification_gained2", 100)->nullable();
            $table->string("education_institution2", 100)->nullable();
            $table->string("education_date3", 100)->nullable();
            $table->string("qualification_gained3", 100)->nullable();
            $table->string("education_institution3", 100)->nullable();
            $table->string("education_date4", 100)->nullable();
            $table->string("qualification_gained4", 100)->nullable();
            $table->string("education_institution4", 100)->nullable();
            $table->string("education_date5", 100)->nullable();
            $table->string("qualification_gained5", 100)->nullable();
            $table->string("education_institution5", 100)->nullable();
            $table->string("other_acheivement", 100)->nullable();
            $table->string("medical_fitness", 200)->nullable();
            $table->string("medical_details", 100)->nullable();
            $table->string("criminal_conviction", 100)->nullable();
            $table->string("criminal_details", 200)->nullable();
            $table->longText("applicant_signature")->nullable();
            $table->string("applicant_declaration_date", 100)->nullable();
            $table->string("declare_name", 100)->nullable();
            $table->string("declare_place", 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sar_applications');
    }
};
