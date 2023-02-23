<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookableBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(config('rinvex.bookings.tables.bookable_bookings'), function (Blueprint $table) {
            // Columns
            $table->integer('quantity')->unsigned()->nullable()->change();
            $table->string('currency', 3)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table(config('rinvex.bookings.tables.bookable_bookings'), function (Blueprint $table) {
            $table->integer('quantity')->unsigned()->nullable(false)->change();
            $table->string('currency', 3)->nullable(false)->change();
        });
    }

}
