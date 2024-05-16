<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->nullable();
            $table->date('event_date');
            $table->integer('days_left')->nullable();;
            $table->string('location')->nullable();
            $table->string('venue')->nullable();
            $table->string('duration')->nullable();
            $table->string('event_type')->nullable();
            $table->string('category_select')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('video_inks')->nullable();
            $table->string('conductors')->nullable();
            
            $table->string('featured_musicians')->nullable();
            $table->string('number_of_attendees')->nullable();
            $table->string('program')->nullable();
            $table->string('language')->nullable();
            $table->string('age_restrictions')->nullable();
            $table->string('ticket_price_range')->nullable();
            $table->string('family_friendly')->nullable();
            $table->string('season')->nullable();
            $table->string('special_occasion')->nullable();
            $table->string('live_stream')->nullable();
            $table->string('instrumental_focus')->nullable();
            $table->string('guest_artists')->nullable();
            $table->string('accessibilty_features')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('url')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->integer('is_featured')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performances');
    }
};
