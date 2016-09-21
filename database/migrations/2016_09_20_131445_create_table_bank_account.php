<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBankAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bank_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_number');
            $table->string('account_name');
            $table->integer('bank_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('status')->default(0);
            $table->string('remarks')->nullable();
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
        //
        Schema::drop('bank_account');
    }
}
