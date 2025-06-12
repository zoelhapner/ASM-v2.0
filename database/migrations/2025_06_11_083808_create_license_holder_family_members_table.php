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
        Schema::create('license_holder_family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('license_holder_id')->constrained();
            $table->string('name');
            $table->unsignedTinyInteger('relationship');
            $table->unsignedtinyInteger('gender');
            $table->date('birth_date');
            $table->string('job');
            $table->string('job_phone');
            $table->string('last_education_level');
            $table->string('institution_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_holder_family_members');
    }
};
