<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDeviceChargeInstrument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_charge_instrument', function (Blueprint $table) {
            $table->unsignedBigInteger('device_charge_id')->index();
            $table->unsignedBigInteger('instrument_id')->index();
            $table->primary(['device_charge_id', 'instrument_id']);
            $table->smallInteger('instrument_count_per_charge');
            // $table->foreign('role_id')->references('id')->on('instruments')->onDelete('cascade');
            // $table->foreign('device_charge_id')->references('id')->on('device_charges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_charge_instrument');
    }
}
