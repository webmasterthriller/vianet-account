<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rib', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('bank_provider');
            $table->string('iban');
            $table->string('swift');
            $table->string('login_name')->nullable();
            $table->string('login_pwd')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key
            $table->foreign('garant')->references('id')->on('garant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rib');
    }
}
