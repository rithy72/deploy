<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoicePaymentRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoice_payment_record', function (Blueprint $table){
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('transaction_type');
            $table->string('display_transaction')->nullable(true);
            $table->float('amount');
            $table->integer('user_id');
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
        Schema::dropIfExists('invoice_payment_record');
    }
}
