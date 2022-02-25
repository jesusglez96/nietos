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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId("origin_id")->constrained("airports")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("destiny_id")->constrained("airports")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamp("date");
            $table->integer("seat_total");
            $table->integer("seat_available");
            $table->float("price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
