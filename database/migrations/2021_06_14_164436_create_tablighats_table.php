<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablighatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablighats', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('file_id');
            $table->string('instagram_link')->nullable();
            $table->string('sms_text')->nullable();
            $table->boolean('has_done')->default(false);
            $table->string('when_done')->nullable();
            $table->string('who_did')->nullable();
            $table->text('images')->nullable();

            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();
            $table->text('ad_text')->nullable();

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
        Schema::dropIfExists('tablighats');
    }
}
