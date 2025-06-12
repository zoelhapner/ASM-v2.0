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
            $table->uuid('license_id');
            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');
            $table->string('name');
            $table->unsignedBigInteger('religion_id');
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->string('identity_number', 16);
            $table->string('driver_license_number', 20);
            $table->string('birth_place');
            $table->string('birth_date', 10);
            $table->longText('address');
            $table->string('phone');
            $table->string('hobby');
            $table->unsignedTinyInteger('marital_status');
            $table->string('married_date', 10);
            $table->unsignedTinyInteger('indonesian_literacy');
            $table->unsignedTinyInteger('indonesian_profiency');
            $table->unsignedTinyInteger('arabic_literacy');
            $table->unsignedTinyInteger('arabic_profiency');
            $table->unsignedTinyInteger('engish_literacy');
            $table->unsignedTinyInteger('english_profiency');
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
