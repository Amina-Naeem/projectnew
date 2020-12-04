<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Memory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('memories', function (Blueprint $table) {
            $table->integer('id');
            $table->text('memory');
            $table->string('img')->nullable();
            $table->string('email');
            $table->timestamps();
            $table->primary(['id', 'email']);
            $table->foreign('email')->references('email')->on('users');
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
        Schema::dropIfExists('memories');
    }
}
