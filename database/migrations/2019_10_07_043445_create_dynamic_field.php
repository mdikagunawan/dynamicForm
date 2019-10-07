<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('telefon');
            $table->string('posisi');
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
        Schema::dropIfExists('dynamic_fields');
    }
}
