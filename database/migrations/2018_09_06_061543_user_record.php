<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_record', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('invoice_id');
            $table->string('action');
            $table->text('action_detail');
            $table->dateTime('date_time');
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
        Schema::dropIfExists('user_record');
    }
}
