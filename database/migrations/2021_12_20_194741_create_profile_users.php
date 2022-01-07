<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('province');
            $table->string('gender');
            $table->integer('user_id')->unsigned();
            $table->longText('bio');
            $table->longText('facebook');
            $table->timestamps();

                $table->foreign('user_id')->references("id")->on("users")->onDelete("cascade");
            });
    }

   
    public function down()
    {
        Schema::dropIfExists('profile_users');
    }
}
