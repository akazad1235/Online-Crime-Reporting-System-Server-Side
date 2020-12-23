<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('user_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone')->nullable();
            $table->bigInteger('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(0);
            $table->integer('acc_active')->default(0);
            $table->string('varification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('user_registrations');
    }
}
