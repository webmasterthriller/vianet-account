<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->bigInteger('owner_client');
            $table->enum('type',['credit','debit']);
            $table->float('amount');
            $table->timestamp('complete_at');
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key
            $table->foreign('owner_client')->references('id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
