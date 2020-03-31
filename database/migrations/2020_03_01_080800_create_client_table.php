<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('garant');
            $table->enum('gender',['M.','Mrs','Mme']);
            $table->string('name');
            $table->string('surname');
            $table->text('address');
            $table->string('post_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->timestamp('signed_at');
            $table->boolean('granted');
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
