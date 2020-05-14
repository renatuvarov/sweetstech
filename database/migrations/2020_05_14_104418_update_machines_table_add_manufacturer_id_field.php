<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMachinesTableAddManufacturerIdField extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->unsignedInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->dropForeign('machines_manufacturer_id_foreign');
            $table->dropColumn('manufacturer_id');
        });
    }
}
