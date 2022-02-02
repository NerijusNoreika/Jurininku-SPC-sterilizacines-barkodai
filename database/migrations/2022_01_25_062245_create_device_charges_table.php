<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_charges', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('charge_index')->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('barcode')->unique()->index();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('device_id');
            $table->timestamps();
            
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('device_id')->references('id')->on('devices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_charges');
    }
}
