<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('evento_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->string('address');
            $table->string('city');
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
        //
    }
}
