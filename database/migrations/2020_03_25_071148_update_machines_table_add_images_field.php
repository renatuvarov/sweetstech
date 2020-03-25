<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTableAddImagesField extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->json('images')->nullable();
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }
}
