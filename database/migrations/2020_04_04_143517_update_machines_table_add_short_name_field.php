<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTableAddShortNameField extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->string('short_name_en', 100);
            $table->string('short_name_ru', 100);
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropColumn('short_name_en');
            $table->dropColumn('short_name_ru');
        });
    }
}
