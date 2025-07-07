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
        Schema::create('employee_license', function (Blueprint $table) {
             $table->uuid('license_id'); // harus uuid, BUKAN bigIncrements/bigInteger
            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');

            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->primary(['license_id', 'employee_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_license');
    }
};
