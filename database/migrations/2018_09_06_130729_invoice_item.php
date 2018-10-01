<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoice_item', function (Blueprint $table){
           $table->increments('id');
           $table->integer('invoice_id');
           $table->integer('item_type_id');
           $table->text('first_feature')->nullable(true);
            $table->text('second_feature')->nullable(true);
            $table->text('third_feature')->nullable(true);
            $table->text('fourth_feature')->nullable(true);
            $table->integer('status');
            $table->boolean('delete_able')->default(true);
            $table->dateTime('in_date');
            $table->integer('in_user_id');
            $table->dateTime('out_date')->nullable(true);
            $table->integer('user_id')->nullable(true);
            $table->float('sale_price')->nullable(true);
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
        Schema::dropIfExists('invoice_item');
    }
}
