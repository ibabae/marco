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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('UserId')->nullable();
            $table->integer('PostId');
            $table->integer('Parent')->default(0);
            $table->integer('Rating')->default(5);
            $table->longText('Comment');
            $table->string('Author');
            $table->string('Phone');
            $table->integer('Job')->nullable();
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
        Schema::dropIfExists('comments');
    }
};
