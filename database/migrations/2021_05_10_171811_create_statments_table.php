<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statments', function (Blueprint $table) {
            $table->id();

            $table->integer('moshaver_id');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('img')->nullable();
            $table->string('cate')->nullable();
            $table->string('expire_at')->nullable();

            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();

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
        Schema::dropIfExists('statments');
    }
}
