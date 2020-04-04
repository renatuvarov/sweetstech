<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTableAddMetaDescriptionField extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->string('meta_description_en')->nullable();
            $table->string('meta_description_ru')->nullable();
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropColumn('meta_description_en');
            $table->dropColumn('meta_description_ru');
        });
    }
}
