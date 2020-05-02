<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable(); //* Sign in with Goole doesn't need it
            $table->string('phone')->nullable()->unique(); //* Sign in with Goole doesn't need it
            $table->date('birth')->nullable(); //TODO: Doesn't need in register form ??
            $table->boolean('gender')->nullable();
            $table->string('nik')->nullable()->unique();
            $table->string('occupation')->nullable();
            $table->string('city')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('picture')->nullable();
            $table->text('description')->nullable();
            $table->integer('completeness')->default(0); //TODO: Need configuration when manually register and Sign in with Google
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
