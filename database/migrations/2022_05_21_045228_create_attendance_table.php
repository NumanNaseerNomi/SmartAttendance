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
        Schema::create('attendance',
            function (Blueprint $table)
            {
                $table->id();
                $table->integer('userId');
                $table->integer('deviceId');
                $table->dateTime('checkIn', $precision = 0);
                $table->dateTime('checkOut', $precision = 0)->nullable();
                $table->boolean('isPresent');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};
