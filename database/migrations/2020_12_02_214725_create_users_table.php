<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
           // $table->unsignedBigInteger('station')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('is_admin')->default(0);
            $table->integer('status')->default(1);
            $table->string('password');
            $table->timestamps();
            // $table->foreign('station')->references('id')->on('police_stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
