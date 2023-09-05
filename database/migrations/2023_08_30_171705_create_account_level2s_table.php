<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountLevel2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_level2s', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('account_level1s')->onDelete('cascade');
            $table->string('name');
            $table->string('status');
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
        Schema::dropIfExists('account_level2s');
    }
}
