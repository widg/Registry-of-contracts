<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->nullable();
            $table->string('company')->nullable();
            $table->string('companysigned')->nullable();
            $table->string('counterparty')->nullable();
            $table->string('counterpartysigned')->nullable();
            $table->string('document')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->string('unit')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('registries');
    }
}
