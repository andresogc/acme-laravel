<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('placa')->unique();
            $table->string('color');
            $table->string('marca')->nullable();
            $table->enum('tipo',['Particular','Publico']);
            $table->unsignedBigInteger('propietario_id');
            $table->unsignedBigInteger('conductor_id')->nullable();
            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conductor_id')->references('id')->on('users')->onDelete('cascade');
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
