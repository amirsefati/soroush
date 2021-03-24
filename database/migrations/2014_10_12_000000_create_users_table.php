<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('userid_inter');

            $table->string('code_meli')->nullable();
            $table->integer('level')->default(1);

            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('tel1')->nullable();
            $table->text('desc')->nullable();
            $table->text('info')->nullable();
            $table->text('comment')->nullable();

            $table->string('religen')->nullable();
            $table->string('sporty')->nullable();
            $table->string('team')->nullable();
            $table->string('likes')->nullable();

            $table->integer('rank')->default(0);
            $table->text('pic')->nullable();
            $table->text('documnts')->nullable();
            $table->text('video')->nullable();
            $table->string('last_seen')->nullable();

            $table->string('type')->nullable();
            $table->double('price')->nullable();
            $table->float('area')->nullable();
            $table->double('rent_annual')->nullable();
            $table->double('rent_month')->nullable();
            $table->integer('depot')->nullable();
            $table->integer('elevator')->nullable();
            $table->integer('parking')->nullable();
            $table->integer('balcony')->nullable();

            $table->string('status')->nullable();
            $table->string('rate')->nullable();

            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();
            $table->string('etc3')->nullable();
            $table->string('etc4')->nullable();
            $table->string('etc5')->nullable();
            $table->string('etc6')->nullable();
            $table->string('etc7')->nullable();
            $table->string('etc8')->nullable();

            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
