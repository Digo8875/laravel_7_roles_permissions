<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permission', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->string('status')->default('UNLOCKED'); // LOCKED, UNLOKED, EXPIRED

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_permission');

            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('id_permission')->references('id')->on('permission')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permission');
    }
}
