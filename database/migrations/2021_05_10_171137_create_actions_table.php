<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            
            $table->integer('moshaver_id')->nullable();
            $table->integer('file_id')->nullable();
            $table->integer('client_id')->nullable();

            $table->string('date')->nullable();
            $table->text('text')->nullable();
            $table->integer('kind');
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->string('link')->nullable();

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
        Schema::dropIfExists('actions');
    }
}
