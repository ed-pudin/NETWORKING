<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fullName', 50);
            $table->string('linkedin', 100);
            $table->string('image', 500);
            $table->unsignedBigInteger('interests');
            $table->foreign('interests')->references('id')->on('interests');
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function(Blueprint $table)
        {
            $table->dropForeign('interests');
            $table->dropForeign('user');
        });
        Schema::dropIfExists('students');
    }
};
