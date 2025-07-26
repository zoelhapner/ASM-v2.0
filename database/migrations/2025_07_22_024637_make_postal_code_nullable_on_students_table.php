<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakePostalCodeNullableOnStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_district_id')->nullable()->change();
            $table->unsignedBigInteger('postal_code_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_district_id')->nullable(false)->change();
            $table->unsignedBigInteger('postal_code_id')->nullable(false)->change();
        });
    }
}
