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
            $table->id();
            $table->foreignId('license_id')->constrained();
            $table->string('name');
            $table->foreignId('religion')->constrained();
            $table->string('identity_number', 16);
            $table->string('driver_license_number', 20);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->longText('address');
            $table->string('phone');
            $table->string('hobby');
            $table->unsignedTinyInteger('marital_status');
            $table->date('married_date');
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
