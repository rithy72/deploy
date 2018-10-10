<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('item_type', function (Blueprint $table){
            $table->increments('id');
            $table->string('type_name');
            $table->boolean('status')->default(true);
            $table->boolean('delete_able')->default(true);
            $table->text('notes')->nullable(true);
            $table->boolean('deleted')->default(false);
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
        Schema::dropIfExists('item_type');
    }
}
