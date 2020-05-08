<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('dest_name');
            $table->string('dest_location');
            $table->string('dest_picture');
            $table->date('start_date');
            $table->date('end_date');
            $table->dateTime('gather_time')->nullable();
            $table->string('gather_point');
            $table->integer('required_person');
            $table->string('categories');
            $table->text('description')->nullable();
            $table->integer('status')->default(0)->comment('-1:cancelled, 0:preparation, 1:ongoing, 2:success');
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
        Schema::dropIfExists('partner');
    }
}
