<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillpayAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billpay_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('pay_account_name');
            $table->string('pay_nickname');
            $table->string('pay_account_address');
            $table->string('pay_city_state_zip');
            $table->string('pay_account_number', 12)->unique();
            $table->string('pay_account_phone',15);
            $table->string('active_user');
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
        Schema::dropIfExists('billpay_accounts');
    }
}
