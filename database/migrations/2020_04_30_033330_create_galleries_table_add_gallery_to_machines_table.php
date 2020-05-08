<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTableAddGalleryToMachinesTable extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->json('images');
        });

        Schema::table('machines', function (Blueprint $table) {
            $table->unsignedInteger('gallery_id')->nullable();
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropForeign('machines_gallery_id_foreign');
            $table->dropColumn('gallery_id');
        });

        Schema::dropIfExists('galleries');
    }
}
