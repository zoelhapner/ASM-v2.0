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
        Schema::create('license_holder_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('license_holder_id')->constrained();
            $table->string('company_name');
            $table->string('city');
            $table->string('phone');
            $table->string('position');
            $table->unsignedTinyInteger('employment_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_current');
            $table->string('skills_used');
            $table->text('job_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_holder_work_experiences');
    }
};
