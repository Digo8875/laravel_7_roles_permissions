<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('texto');
            $table->string('status'); // CREATED, PUBLISHED, REJECTED

            $table->unsignedBigInteger('id_user_creator');
            $table->unsignedBigInteger('id_user_reviewer')->nullable();

            $table->foreign('id_user_creator')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('id_user_reviewer')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigo');
    }
}
