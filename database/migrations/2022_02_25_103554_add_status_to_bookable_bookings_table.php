<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToBookableBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(config('rinvex.bookings.tables.bookable_bookings'), function (Blueprint $table) {
            $table->enum('status', ['Pending', 'Completed', 'Rejected']);
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
            $table->dropColumn('status');
        });
    }

}
