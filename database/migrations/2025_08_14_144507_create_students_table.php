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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('license_id');
            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');
            $table->uuid('user_id')->after('license_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nis')->unique();
            $table->string('fullname');
            $table->string('nickname');
            $table->unsignedtinyInteger('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->integer('age')->nullable();
            $table->unsignedBigInteger('religion_id');
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->longText('address');
            $table->string('email')->nullable();
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
            $table->string('father_name');
            $table->string('father_phone', 20);
            $table->string('mother_name');
            $table->string('mother_phone', 20);
            $table->string('student_phone', 20)->nullable();
            $table->string('previous_school');
            $table->string('grade');
            $table->string('status');
            $table->string('photo')->nullable();
            $table->unsignedtinyInteger('where_know');
            $table->date('registered_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
