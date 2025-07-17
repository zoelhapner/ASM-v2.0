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
        Schema::create('license_holders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('fullname');
            $table->string('nickname');
            $table->unsignedtinyInteger('gender');
            $table->unsignedBigInteger('religion_id');
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->string('identity_number', 16);
            $table->string('driver_license_number', 20)->nullable();
            $table->string('birth_place');
            $table->string('birth_date', 10);
            $table->longText('address');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedBigInteger('sub_district_id');
            $table->foreign('sub_district_id')->references('id')->on('sub_districts')->onDelete('cascade');
            $table->unsignedBigInteger('postal_code_id');
            $table->foreign('postal_code_id')->references('id')->on('postal_codes')->onDelete('cascade');
            $table->string('phone');
            $table->string('hobby');
            $table->unsignedTinyInteger('marital_status');
            $table->string('married_date', 10)->nullable();
            $table->unsignedTinyInteger('indonesian_literacy')->nullable();
            $table->unsignedTinyInteger('indonesian_proficiency')->nullable();
            $table->unsignedTinyInteger('arabic_literacy')->nullable();
            $table->unsignedTinyInteger('arabic_proficiency')->nullable();
            $table->unsignedTinyInteger('english_literacy')->nullable();
            $table->unsignedTinyInteger('english_proficiency')->nullable();
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_holders');
    }
};
