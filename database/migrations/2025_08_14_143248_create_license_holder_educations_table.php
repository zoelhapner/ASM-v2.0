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
        Schema::create('license_holder_educations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('license_holder_id');
            $table->foreign('license_holder_id')->references('id')->on('license_holders')->onDelete('cascade');
            $table->string('education_level');
            $table->string('institution_name');
            $table->string('major')->nullable();
            $table->integer('start_year');
            $table->integer('end_year')->nullable();
            $table->boolean('is_graduated');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_holder_educations');
    }
};
