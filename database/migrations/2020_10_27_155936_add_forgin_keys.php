<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForginKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('categories', function (Blueprint $table) {
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade');
      });
      Schema::table('user_models', function (Blueprint $table) {
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade');
        $table->foreign('category_id')
        ->references('id')->on('categories')
        ->onDelete('cascade');
      });
      Schema::table('services', function (Blueprint $table) {
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade');
        $table->foreign('user_model_id')
        ->references('id')->on('user_models')
        ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
