<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('holiday_id');
            $table->string('name');
            $table->timestamps();
            $table->foreign('holiday_id')->references('id')->on('holidays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holiday_names');
    }
}
