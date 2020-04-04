<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTableAddShortDescriptionField extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('short_description_en');
            $table->text('short_description_ru');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('short_description_en');
            $table->dropColumn('short_description_ru');
        });
    }
}
