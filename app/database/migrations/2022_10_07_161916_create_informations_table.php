<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_id');
            $table->integer('time_id');
            $table->string('name',30);
            $table->string('prif',16);
            $table->string('city',30);
            $table->string('adress',30);
            $table->string('station',16);
            $table->text('access');
            $table->string('tel',16);
            $table->string('holiday',16);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('price');
            $table->text('lat');
            $table->text('lng');
            $table->integer('check_id');
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
        Schema::dropIfExists('informations');
    }
}
