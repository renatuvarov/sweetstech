<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTableAddMail extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->text('mail_en');
            $table->text('mail_ru');
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropColumn('mail_en');
            $table->dropColumn('mail_ru');
        });
    }
}
