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
        Schema::table('servers', function (Blueprint $table) {
            $table->string('game_ip')->default('127.0.0.1');
            $table->unsignedBigInteger('game_port')->default('49000');
            $table->unsignedBigInteger('game_console_port')->default('44452');
            $table->string('db_ip')->default('127.0.0.1');
            $table->unsignedBigInteger('db_port')->default(1433);
            $table->string('username')->default('sa');
            $table->string('password')->default('genius');
            $table->string('telecaster_db')->default('Telecaster');
            $table->string('arcadia_db')->default('Arcadia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->dropColumn('game_ip');
            $table->dropColumn('game_port');
            $table->dropColumn('game_console_port');
            $table->dropColumn('db_ip');
            $table->dropColumn('db_port');
            $table->dropColumn('username');
            $table->dropColumn('password');
            $table->dropColumn('telecaster_db');
            $table->dropColumn('arcadia_db');
        });
    }
};
