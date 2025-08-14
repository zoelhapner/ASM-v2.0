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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('nik');
            $table->string('fullname');
            $table->string('nickname');
            $table->unsignedtinyInteger('gender');
            $table->string('birth_place');
            $table->string('birth_date', 10);
            $table->unsignedTinyInteger('marital_status');
            $table->unsignedBigInteger('religion_id');
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->string('identity_number', 16);
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
            $table->json('position');
            $table->json('department');
            $table->json('unit');
            $table->string('employment_status');
            $table->string('start_date', 10);
            $table->decimal('basic_salary', 15, 2);
            $table->decimal('allowance', 15, 2);
            $table->decimal('deduction', 15, 2);
            $table->decimal('bonus', 15, 2);
            $table->decimal('thr', 15, 2);
            $table->string('contract_letter_file');
            $table->string('photo')->nullable();
	        $table->string('identity_photo')->nullable();
            $table->string('instructure_certificate');
            $table->string('expired_date_certificate', 10);            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
