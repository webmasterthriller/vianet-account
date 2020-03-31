<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->unsignedInteger('init_garant'); // Garant
            $table->unsignedInteger('by_client'); // Client
            $table->enum('type',['fee','loan']);
            $table->string('libelle');
            $table->float('taxe');
            $table->timestamp('init_at')->default(date_timestamp_get());
            $table->boolean('done');
            $table->timestamp('done_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key
            $table->foreign('init_garant')->references('id')->on('garant');
            $table->foreign('by_client')->references('id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation');
    }
}
