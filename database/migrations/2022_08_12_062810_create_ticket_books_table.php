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
        Schema::create('ticket_books', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_number');
            $table->string('movie_id');
            $table->string('movie_name');
            $table->integer('user_id');
            $table->string('user_name');
            $table->integer('price');
            $table->string('method');
            $table->string('tnx_id');
            $table->string('show_time');
            $table->date('show_date');
            $table->string('branch');
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
        Schema::dropIfExists('ticket_books');
    }
};
