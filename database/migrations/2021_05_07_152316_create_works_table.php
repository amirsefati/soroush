<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();

            $table->integer('type')->nullable();

            $table->integer('moshaver_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('file_id')->nullable();
            $table->integer('taavon_id')->nullable();

            $table->text('showfile')->nullable();
            $table->text('gotofile')->nullable();
            $table->text('meeting')->nullable();
            $table->text('contruct')->nullable();

            $table->text('desc')->nullable();
            $table->text('comment')->nullable();
            $table->text('picture')->nullable();
            $table->text('calls')->nullable();

            $table->string('showfile_date')->nullable();
            $table->string('gotofile_date')->nullable();
            $table->string('meeting_date')->nullable();
            $table->string('contruct_date')->nullable();


            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();
            $table->string('etc3')->nullable();

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
        Schema::dropIfExists('works');
    }
}
