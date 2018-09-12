<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DailyReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('daily_report', function (Blueprint $table){
            $table->increments('id');
            $table->date('date');
            $table->integer('in_item')->default(0);
            $table->integer('out_item')->default(0);
            $table->float('outcome')->default(0);
            $table->float('income')->default(0);
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
        Schema::dropIfExists('daily_report');
    }
}
