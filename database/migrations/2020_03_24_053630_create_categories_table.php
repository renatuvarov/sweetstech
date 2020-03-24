<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru', 30)->unique();
            $table->string('name_en', 30)->unique();
            $table->string('slug')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
