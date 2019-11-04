<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperlessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paperlesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('general_statement')->default(2);
            $table->string('tax_statement')->default(2);
            $table->string('notification')->default(2);
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
        Schema::dropIfExists('paperlesses');
    }
}
