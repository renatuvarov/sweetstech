<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTableAddIsNewField extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->boolean('is_new')->default(false);
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropColumn('is_new');
        });
    }
}
