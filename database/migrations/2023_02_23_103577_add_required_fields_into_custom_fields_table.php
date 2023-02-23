<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRequiredFieldsIntoCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(config('rinvex.bookings.tables.custom_fields'), function (Blueprint $table) {
            $table->string('input_name')->after('id');
            $table->string('input_type')->after('input_name');
            $table->unsignedBigInteger('user_id')->after('input_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table(config('rinvex.bookings.tables.custom_fields'), function (Blueprint $table) {
            $table->dropColumn('input_name');
            $table->dropColumn('input_type');
            $table->dropColumn('user_id');
        });
    }

}
