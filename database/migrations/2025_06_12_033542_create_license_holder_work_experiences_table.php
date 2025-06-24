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
        Schema::create('license_holders_work_experiences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('license_holder_id');
            $table->foreign('license_holder_id')->references('id')->on('license_holders')->onDelete('cascade');
            $table->string('company_name');
            $table->string('city');
            $table->string('phone');
            $table->string('position')->nullable();
            $table->unsignedTinyInteger('employment_type');
            $table->string('start_date', 10);
            $table->string('end_date', 10)->nullable();
            $table->boolean('is_current');
            $table->string('skills_used')->nullable();
            $table->text('job_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_holders_work_experiences');
    }
};
