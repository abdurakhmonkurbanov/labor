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
        Schema::create('kirim_reaktivs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reaktiv_id');
            $table->foreign('reaktiv_id')->references('id')->on('reaktives');
            $table->bigInteger('amount')->default(0);
            $table->text('coments')->default(NULL);
            $table->timestamp('created_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kirim_reaktivs');
    }
};
