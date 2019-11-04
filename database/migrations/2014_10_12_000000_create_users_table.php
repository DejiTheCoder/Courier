<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('home_address');
            $table->string('postal_address');
            $table->string('country');
            $table->string('gender');
            $table->string('email_address')->unique();
            $table->string('mobile_number')->unique();
            $table->string('occupation');
            $table->string('account_type');
            $table->string('residency');
            $table->string('next_of_kin');
            $table->string('ssn')->unique();
            $table->string('password');
            $table->string('welcome_message');
            $table->integer('amount')->default(0);
            $table->string('account_number')->default(0);
            $table->string('user_serial_number')->default(0);
            $table->timestamp('isVerified')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
