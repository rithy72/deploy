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
            $table->integer('parent_id');
            $table->integer('action');
            $table->integer('audit_group');
            $table->string('display_audit');
            $table->text('detail')->nullable(true);
            $table->text('change_log')->nullable(true);
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
