<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUserModelImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_model_images', function (Blueprint $table) {
            $table->unsignedBigInteger('user_model_id');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_model_images', function (Blueprint $table) {
            $table->dropColumn("user_model_id");
            $table->dropColumn("path");
        });
    }
}
