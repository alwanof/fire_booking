<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingKeyToBookableBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(config('rinvex.bookings.tables.bookable_bookings'), function (Blueprint $table) {
            $table->string('booking_key');
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
            $table->dropColumn('booking_key');
        });
    }

}
