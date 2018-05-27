<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->string('numero_placa');
            $table->string('numero_chasis');
            $table->string('marca');
            $table->string('modelo');
            $table->year('year_fabricacion');
            $table->string('color');
            $table->string('status'); // robado, normal o perdido
            $table->integer('pertenencia')->default(1);
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
        Schema::dropIfExists('vehicles');
    }
}
