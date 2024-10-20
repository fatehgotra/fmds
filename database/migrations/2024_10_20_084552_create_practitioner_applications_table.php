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
        Schema::create('practitioner_applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("application_id");
            $table->string("wish_practice", 100)->nullable();
            $table->string("surname", 100)->nullable();
            $table->string("forename", 100)->nullable();
            $table->string("othername", 100)->nullable();
            $table->string("tax_identification", 100)->nullable();
            $table->string("registration", 100)->nullable();
            $table->string("dob", 100)->nullable();
            $table->string("sex", 100)->nullable();
            $table->string("country_of_citizenship", 100)->nullable();
            $table->string("residential_address", 100)->nullable();
            $table->string("postal_address", 100)->nullable();
            $table->string("telephone", 100)->nullable();
            $table->string("work_phone", 100)->nullable();
            $table->string("mobile", 100)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("passport_number", 100)->nullable();
            $table->string("edp_number", 100)->nullable();
            $table->string("language_spoken", 100)->nullable();
            $table->string("fnfp_number", 100)->nullable();
            $table->string("next_of_kin", 100)->nullable();
            $table->string("kin_relationship", 100)->nullable();
            $table->string("kin_address", 100)->nullable();
            $table->string("kin_phone", 100)->nullable();
            $table->string("kin_email", 100)->nullable();
            $table->string("date_of_entry1", 100)->nullable();
            $table->string("regestering_authority1", 100)->nullable();
            $table->string("name_of_nation1", 100)->nullable();
            $table->string("valid_until1", 100)->nullable();
            $table->string("general_specialist1", 100)->nullable();
            $table->string("date_of_entry2", 100)->nullable();
            $table->string("regestering_authority2", 100)->nullable();
            $table->string("name_of_nation2", 100)->nullable();
            $table->string("valid_until2", 100)->nullable();
            $table->string("general_specialist2", 100)->nullable();
            $table->string("date_of_entry3", 100)->nullable();
            $table->string("regestering_authority3", 100)->nullable();
            $table->string("name_of_nation3", 100)->nullable();
            $table->string("valid_until3", 100)->nullable();
            $table->string("general_specialist3", 100)->nullable();
            $table->string("date_of_entry4", 100)->nullable();
            $table->string("regestering_authority4", 100)->nullable();
            $table->string("name_of_nation4", 100)->nullable();
            $table->string("valid_until4", 100)->nullable();
            $table->string("general_specialist4", 100)->nullable();
            $table->string("date_of_entry5", 100)->nullable();
            $table->string("regestering_authority5", 100)->nullable();
            $table->string("name_of_nation5", 100)->nullable();
            $table->string("valid_until5", 100)->nullable();
            $table->string("general_specialist5", 100)->nullable();
            $table->string("qualification_gained", 100)->nullable();
            $table->string("institute", 100)->nullable();
            $table->string("year_length_program", 100)->nullable();
            $table->string("clinical_instruction", 100)->nullable();
            $table->string("language_of_course", 100)->nullable();
            $table->string("conditional", 100)->nullable();
            $table->string("vocational_text", 100)->nullable();
            $table->string("temporary_from", 100)->nullable();
            $table->string("temporary_to", 100)->nullable();
            $table->string("indemnity", 100)->nullable();
            $table->string("indemnity_details", 100)->nullable();
            $table->string("criminal_conviction", 100)->nullable();
            $table->string("criminal_details", 100)->nullable();
            $table->string("business_interest", 100)->nullable();
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
        Schema::dropIfExists('practitioner_applications');
    }
};
