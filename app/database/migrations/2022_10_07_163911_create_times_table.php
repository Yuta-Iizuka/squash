<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('term_1');
            $table->integer('term_2');
            $table->integer('term_3');
            $table->integer('term_4');
            $table->integer('term_5');
            $table->integer('term_6');
            $table->integer('term_7');
            $table->integer('term_8');
            $table->integer('term_9');
            $table->integer('term_10');
            $table->integer('term_11');
            $table->integer('term_12');
            $table->integer('term_13');
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
        Schema::dropIfExists('times');
    }
}
