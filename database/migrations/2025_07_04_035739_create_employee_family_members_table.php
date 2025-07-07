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
         Schema::create('employee_family_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('name');
            $table->unsignedTinyInteger('relationship');
            $table->unsignedtinyInteger('gender');
            $table->string('birth_date', 10);
            $table->string('job')->nullable();
            $table->string('job_phone')->nullable();
            $table->string('last_education_level')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('company_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_family_members');
    }
};
