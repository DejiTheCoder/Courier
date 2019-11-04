<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillpaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billpays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('pay_transaction_id');
            $table->string('pay_source_account');
            $table->string('pay_destination_account');
            $table->string('pay_amount');
            $table->string('pay_date_transaction');
            $table->string('pay_transaction_status')->default(0);
            $table->string('pay_approve_status')->default(0);
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
        Schema::dropIfExists('billpays');
    }
}
