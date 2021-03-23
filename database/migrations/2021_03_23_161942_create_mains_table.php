<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mains', function (Blueprint $table) {
            $table->id();
            $table->integer('moshaver_userid');
            $table->integer('customer_userid')->nullable();
            $table->integer('file_id')->nullable();
            $table->integer('mtaavon_userid')->nullable();
            $table->string('available')->default(1);
            $table->integer('kind_type')->nullable();

            
            $table->text('times')->nullable();

            $table->string('show_file')->nullable();
            $table->text('show_file_call')->nullable();
            $table->string('show_house')->nullable();
            $table->text('show_house_call')->nullable();
            $table->string('meeting')->nullable();
            $table->text('meeting_call')->nullable();

            $table->string('status')->nullable();
            $table->text('comment')->nullable();
            $table->text('desc')->nullable();
            $table->string('reminder')->nullable();

            $table->string('expire_at')->nullable();
            $table->text('details')->nullable();
            $table->text('meeting_pic')->nullable();
            $table->text('documents')->nullable();
            $table->text('pics')->nullable();
            $table->text('videos')->nullable();
            $table->text('tags')->nullable();

            $table->string('next_noti_1')->nullable();
            $table->string('next_noti_2')->nullable();
            $table->string('next_noti_3')->nullable();
            $table->string('next_noti_4')->nullable();

            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();
            $table->string('etc3')->nullable();
            $table->string('etc4')->nullable();
            $table->string('etc5')->nullable();
            $table->string('etc6')->nullable();

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
        Schema::dropIfExists('mains');
    }
}
