<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTableAddRedirectPdfFields extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->boolean('is_redirect')->nullable();
            $table->string('pdf')->nullable();
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropColumn('is_redirect');
            $table->dropColumn('pdf');
        });
    }
}
