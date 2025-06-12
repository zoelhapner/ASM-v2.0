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
            $table->id();
            $table->foreignId('license_holder_id')->constrained();
            $table->string('education_level');
            $table->string('institution_name');
            $table->string('major');
            $table->integer('start_year');
            $table->integer('end_year');
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
