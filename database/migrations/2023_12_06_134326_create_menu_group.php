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
        Schema::create('menu_group', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('default_value');;
            $table->timestamps();
        });
        DB::table('menu_group')->insert([
            ['name' => 'Header'],
            ['name' => 'Footer'],
            ['name' => 'SubMenu'],
            ['name' => 'Social'],
            ['name' => 'Connect'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_group');
    }
};
