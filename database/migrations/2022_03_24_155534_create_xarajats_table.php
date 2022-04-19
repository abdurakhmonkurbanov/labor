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
        Schema::create('xarajats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reaktiv_id');
            $table->foreign('reaktiv_id')->references('id')->on('reaktives');
            $table->bigInteger('xarajat_soni')->default(0);
            $table->string('maqsad');
            $table->bigInteger('client_id')->default(0);
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
        Schema::dropIfExists('xarajats');
    }
};
