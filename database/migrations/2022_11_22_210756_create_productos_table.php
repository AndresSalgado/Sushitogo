<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',150);
            $table->double('precio',8,1);
            $table->string('descripcion',255);
            $table->string('imagen',255);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('carta_id');
            $table->foreign('carta_id')->references('id')->on('cartas');
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
        Schema::dropIfExists('productos');
    }
};
