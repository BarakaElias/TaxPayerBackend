<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrelaAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brela_accounts', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('business_name');
            $table->string('director_name');
            $table->string('director_phone_number');
            $table->unsignedBigInteger('tra_id');
            $table->foreign('tra_id')->references('id')->on('tra_accounts');
            $table->string('extract');
            $table->string('tin_number');
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
