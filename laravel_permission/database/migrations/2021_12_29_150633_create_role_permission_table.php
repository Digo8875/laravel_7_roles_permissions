<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->string('status'); // LOCKED, UNLOKED, EXPIRED

            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_permission');

            $table->foreign('id_role')->references('id')->on('role')->onUpdate('cascade')->onDelete('no action');
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
        Schema::dropIfExists('role_permission');
    }
}
