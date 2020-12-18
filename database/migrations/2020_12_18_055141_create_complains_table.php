<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reg_id');
            $table->unsignedBigInteger('station_id');
            $table->string('complain_name');
            $table->string('complain_type');
            $table->text('desc');
            $table->string('address');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->foreign('reg_id')->references('id')->on('registrations')->onDelete('cascade');
            $table->foreign('station_id')->references('id')->on('police_stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complains');
    }
}
