<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->integer('userid_moshaver')->nullable();
            $table->integer('userid_file')->nullable();
            $table->integer('verify')->default(0);
            $table->integer('available')->default(1);
            $table->integer('kind_type')->nullable();

            $table->double('price')->nullable();
            $table->double('rent_annual')->nullable();
            $table->double('rent_month')->nullable();
            $table->float('area')->nullable();
            $table->float('age')->nullable();

            $table->integer('bedroom_number')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('region')->nullable();

            $table->string('address')->nullable();
            $table->text('note')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('tel')->nullable();
            $table->string('tel2')->nullable();
            $table->text('images')->nullable();
            $table->text('videos')->nullable();

            $table->integer('status')->default(1);
            $table->string('totime')->nullable();
            $table->text('visit_time')->nullable();
            $table->integer('depot')->nullable();
            $table->integer('elevator')->nullable();
            $table->integer('parking')->nullable();
            $table->integer('balcony')->nullable();

            $table->string('location')->nullable();
            $table->string('allfloor')->nullable();
            $table->string('suiteinfloor')->nullable();
            $table->string('allsuite')->nullable();
            $table->integer('wc_number')->nullable();
            $table->text('wc')->nullable();
            $table->string('direction')->nullable();

            $table->text('floor_type')->nullable();
            $table->text('shell')->nullable();
            $table->text('outdoor_face')->nullable();
            $table->text('indoor_face')->nullable();
            $table->text('cabinet')->nullable();

            $table->text('cooling')->nullable();
            $table->text('kitchen')->nullable();
            $table->text('indoor_facility')->nullable();
            $table->text('secure_facility')->nullable();
            $table->text('sport_facility')->nullable();
            $table->text('welfair_facility')->nullable();

            $table->text('outdoor_status')->nullable();
            $table->text('indoor_status')->nullable();
            $table->string('evacuation_status')->nullable();
            $table->string('deed_type')->nullable();
            $table->string('convertible')->nullable();

            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();
            $table->string('etc3')->nullable();
            $table->string('etc4')->nullable();

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
        Schema::dropIfExists('files');
    }
}
