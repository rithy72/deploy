<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoice_info', function (Blueprint $table){
            $table->increments('id');
            $table->text('display_id')->nullable(true);
            $table->text('customer_name')->nullable(true);
            $table->text('customer_phone')->nullable(true);
            $table->dateTime('created_date_time');
            $table->date('expired_date');
            $table->integer('user_id');
            $table->string('status');
            $table->boolean('delete_able')->default(false);
            $table->float('grand_total');
            $table->float('paid')->default(0);
            $table->float('remain')->default(0);
            $table->integer('interests_rate');
            $table->dateTime('final_date_time')->nullable(true);
            $table->integer('final_action_user')->nullable(true);
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
        Schema::dropIfExists('invoice_info');
    }
}
