<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('surnames');
            $table->string('age');
            $table->string('sex');
            $table->string('cedula', 13)->unique();
            $table->string('tipo_sangre');
            $table->string('cel', 13)->unique();
            $table->string('email');
            $table->string('addres');
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
        Schema::dropIfExists('patients');
    }
}
