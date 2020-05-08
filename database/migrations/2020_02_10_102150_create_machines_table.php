<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en')->unique();
            $table->string('name_ru')->unique();
            $table->text('description_en');
            $table->text('description_ru');
            $table->string('slug')->unique();
            $table->string('img');
            $table->unsignedTinyInteger('type_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
