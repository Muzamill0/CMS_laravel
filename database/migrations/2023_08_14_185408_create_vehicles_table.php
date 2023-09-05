<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('number');
            $table->string('driver_name');
            $table->string('brand_name');
            $table->string('chases_no');
            $table->string('engine_no');
            $table->string('model_no');
            $table->date('reg_date');
            $table->string('reg_authority');
            $table->string('engine_capacity');
            $table->string('vehicle_value');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('vahicles');
    }
}
