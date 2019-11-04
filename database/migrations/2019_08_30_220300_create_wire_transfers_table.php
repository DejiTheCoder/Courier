<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWireTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wire_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('transaction_id');
            $table->string('beneficiary_country');
            $table->string('beneficiary_bank');
            $table->string('beneficiary_bank_address');
            $table->string('beneficiary_account_number');
            $table->string('beneficiary_routing_number');
            $table->string('beneficiary_sort_code');
            $table->string('beneficiary_swift_code');
            $table->string('beneficiary_name');
            $table->string('beneficiary_address');
            $table->string('pay_amount');
            $table->string('active_user');
            $table->integer('isVerified')->default(0);
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
        Schema::dropIfExists('wire_transfers');
    }
}
