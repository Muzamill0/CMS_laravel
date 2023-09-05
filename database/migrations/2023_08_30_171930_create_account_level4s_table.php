<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountLevel4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_level4s', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('account_level3s')->onDelete('cascade');
            $table->string('name');
            $table->string('opening_balance')->nullable();
            $table->string('balance')->nullable();
            $table->string('status')->nullable();
            $table->string('opening_balance_id')->nullable();
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
        Schema::dropIfExists('account_level4s');
    }
}
