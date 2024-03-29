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
        Schema::create('users',
            function (Blueprint $table)
            {
                $table->id();
                $table->string('name');
                $table->string('userName')->unique();
                $table->string('description');
                $table->string('cardId')->unique();
                $table->string('password');
                $table->boolean('isAdmin');
                $table->boolean('isBlocked');
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
        Schema::dropIfExists('users');
    }
};
