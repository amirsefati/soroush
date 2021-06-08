<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangeMoshaversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('range_moshavers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('seller')->nullable();
            $table->integer('renter')->nullable();
            $table->integer('kolangi')->nullable();
            $table->integer('tejari')->nullable();
            $table->integer('mostaghelat')->nullable();
            $table->integer('space_200')->nullable();
            $table->integer('space_200_350')->nullable();
            $table->integer('space_350')->nullable();

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
        Schema::dropIfExists('range_moshavers');
    }
}
