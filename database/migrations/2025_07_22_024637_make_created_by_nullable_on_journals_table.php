<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCreatedByNullableOnJournalsTable extends Migration
{
    public function up()
    {
        Schema::table('accounting_journals', function (Blueprint $table) {
            $table->uuid('created_by')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('accounting_jurnals', function (Blueprint $table) {
            $table->uuid('created_by')->nullable(false)->change();
        });
    }
}
