<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_no')->nullable();
            $table->date('date');
            $table->integer('amount');
            $table->unsignedBigInteger('acc_level_1');
            $table->foreign('acc_level_1')->references('id')->on('account_level1s')->onDelete('cascade');
            $table->unsignedBigInteger('acc_level_2');
            $table->foreign('acc_level_2')->references('id')->on('account_level2s')->onDelete('cascade');
            $table->unsignedBigInteger('acc_level_3');
            $table->foreign('acc_level_3')->references('id')->on('account_level3s')->onDelete('cascade');
            $table->unsignedBigInteger('acc_level_4');
            $table->foreign('acc_level_4')->references('id')->on('account_level4s')->onDelete('cascade');
            $table->integer('status');
            $table->string('description');
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
        Schema::dropIfExists('transactions');
    }
}
