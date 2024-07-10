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
            $table->string('train_code', 50)->after('id');
            $table->string('company', 100)->after('train_code');
            $table->string('departure_station', 100)->after('company');
            $table->date('departure_date')->after('departure_station');
            $table->time('departure_time')->after('departure_date');
            $table->string('arrival_station', 100)->after('departure_time');
            $table->date('arrival_date')->after('arrival_station');
            $table->time('arrival_time')->after('arrival_date');
            $table->integer('carriage_number')->after('arrival_time');
            $table->boolean('is_ontime')->default(true)->after('carriage_number');
            $table->boolean('is_canceled')->default(false)->after('is_ontime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn('company');
            $table->dropColumn('departure_station');
            $table->dropColumn('arrival_station');
            $table->dropColumn('departure_date');
            $table->dropColumn('arrival_date');
            $table->dropColumn('departure_time');
            $table->dropColumn('arrival_time');
            $table->dropColumn('train_code');
            $table->dropColumn('carriage_number');
            $table->dropColumn('is_ontime');
            $table->dropColumn('is_canceled');
        });
    }
};
