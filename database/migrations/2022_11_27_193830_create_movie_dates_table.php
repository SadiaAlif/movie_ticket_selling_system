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
        Schema::create('movie_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->date('date');
            $table->timestamps();
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn(['show_date','show_time']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_dates');
    }
};
