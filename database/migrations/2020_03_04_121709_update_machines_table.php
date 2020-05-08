<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTable extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropColumn('type_id');
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->unsignedTinyInteger('type_id');
        });
    }
}
