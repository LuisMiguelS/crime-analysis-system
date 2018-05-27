<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrimePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_person', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->integer('crime_id')->unsigned();
            $table->integer('ubication_id')->unsigned();
            $table->integer('weapon_id')->unsigned();
            $table->string('titular');
            $table->text('descripcion');
            $table->year('year');
            $table->integer('mes');
            $table->integer('dia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crime_person');
    }
}
