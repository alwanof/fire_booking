<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('rtl_support');
            $table->string('locale')->uniqe();
            $table->timestamps();
        });
        // Insert Default Language
        $languages =  array(array(
            'name' => 'Arabic',
            'locale' => 'ar',
            'rtl_support' => true
        ),array(
            'name' => 'English',
            'locale' => 'en',
            'rtl_support' => false));
            DB::table('languages')->insert($languages);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
