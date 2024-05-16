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
        Schema::table('generals', function (Blueprint $table) {
            $table->tinyInteger('buy_tickets')->default(0);
            $table->tinyInteger('sign_in')->default(0);
            $table->tinyInteger('search')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generals', function (Blueprint $table) {
            $table->dropColumn('buy_tickets');
            $table->dropColumn('sign_in');
            $table->dropColumn('search');

        });
    }
};
