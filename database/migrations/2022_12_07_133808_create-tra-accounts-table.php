<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tra_accounts', function (Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->unsignedBigInteger('nida_id');
            $table->foreign('nida_id')->references('id')->on('nidas');
            $table->string("tin_number")->unique();
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
