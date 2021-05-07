<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaavonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taavons', function (Blueprint $table) {
            $table->id();
            $table->string('kind');
            $table->integer('taavon_id')->nullable();
            $table->integer('moshaver_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('file_id')->nullable();

            $table->integer('verify')->nullable();
            $table->string('to_date_verify')->nullable();

            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();
            $table->string('etc3')->nullable();
            $table->string('etc4')->nullable();
            $table->string('etc5')->nullable();

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
        Schema::dropIfExists('taavons');
    }
}
