<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_no')->nullable(true);
            $table->string('name');
            $table->string('phone_number')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('username');
            $table->string('password')->nullable(true);
            $table->string('role');
            $table->text('note')->nullable(true);
            $table->boolean('status')->default(true);
            $table->boolean('delete_able')->default(true);
            $table->dateTime('created_date');
            $table->integer('created_by')->nullable(true);
            $table->dateTime('last_update_date')->nullable(true);
            $table->integer('last_update_by')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('deleted')->default(false);
            $table->boolean('just_updated')->default(false);
        });
        //Create Super User
//        DB::table('users')->insert(array(
//            [
//               'name' => 'Super User',
//               'email' => 'admin@admin',
//               'password' => bcrypt("admin@admin123456"),
//               'role' => 'admin'
//            ],
//            [
//                'name' => 'Normal User',
//                'email' => 'user@user',
//                'password' => bcrypt("user@user123456"),
//                'role' => 'user'
//            ]
//        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
