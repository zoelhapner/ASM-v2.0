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
        Schema::create('licenses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('license_type', 2);
            $table->string('name');
            $table->string('email')->unique();
            $table->longText('address');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('postal_code');
            $table->string('phone');
            $table->string('join_date', 10);
            $table->string('expired_date', 10);
            $table->string('contract_agreement_number');
            $table->string('status', 10);
            $table->unsignedTinyInteger('buiding_type');
            $table->unsignedTinyInteger('building_status');
            $table->string('building_rent_expired_date', 10);
            $table->decimal('building_area', 8, 2);
            $table->unsignedTinyInteger('building_condition');
            $table->boolean('building_has_ac');
            $table->string('instagram');
            $table->string('facebook_page');
            $table->string('tiktok');
            $table->string('youtube');
            $table->string('google_maps');
            $table->string('landing_page_student_registration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
