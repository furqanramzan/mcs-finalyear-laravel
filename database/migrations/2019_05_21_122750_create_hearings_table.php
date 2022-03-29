<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHearingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hearings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lawsuit_id')->unsigned();
            $table->string('date');
            $table->string('time');
            $table->timestamps();
            $table->foreign('lawsuit_id')->references('id')->on('lawsuits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hearings');
    }
}
