<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('UserId');
            $table->integer('OrderId');
            $table->integer('Price');
            $table->integer('PayType');
            $table->integer('GateWay');
            $table->string('Authority')->nullable();
            $table->text('TrackId')->nullable();
            $table->string('CardHash')->nullable();
            $table->string('CardPan')->nullable();
            $table->integer('Status')->default(0);
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
};
