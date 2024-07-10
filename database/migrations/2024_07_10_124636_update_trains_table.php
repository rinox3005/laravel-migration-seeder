<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->float('ticket_price', 5, 2)->default(0)->after('is_canceled');
            $table->string('travel_time', 10)->default('0h 0min')->after('ticket_price');
            $table->string('train_type', 50)->default('Regional')->after('travel_time');
            $table->integer('available_seats')->default(0)->after('train_type');
            $table->string('service_class', 20)->default('Economy')->after('available_seats');
            $table->string('conductor_name', 255)->default('Unknown')->after('service_class');
            $table->string('ticket_type', 20)->default('Non-refundable')->after('conductor_name');
            $table->float('average_speed', 5, 2)->default(0.0)->after('ticket_type');
            $table->date('manufacture_date')->nullable()->after('average_speed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn('ticket_price');
            $table->dropColumn('travel_time');
            $table->dropColumn('train_type');
            $table->dropColumn('available_seats');
            $table->dropColumn('service_class');
            $table->dropColumn('conductor_name');
            $table->dropColumn('ticket_type');
            $table->dropColumn('average_speed');
            $table->dropColumn('manufacture_date');
        });
    }
};
