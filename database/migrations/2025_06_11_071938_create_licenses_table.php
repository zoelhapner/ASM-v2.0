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
            $table->id();
            $table->enum('license_type', ['fo', 'so', 'lo','lc']);
            $table->string('name');
            $table->string('email')->unique();
            $table->longText('address');
            $table->foreignId('province_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->string('postal_code');
            $table->string('phone');
            $table->date('join_date');
            $table->date('expired_date');
            $table->string('contract_agreement_number');
            $table->enum('status', ['active', 'inactive', 'expired']);
            $table->unsignedTinyInteger('buiding_type');
            $table->unsignedTinyInteger('building_status');
            $table->date('building_rent_expired_date');
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
