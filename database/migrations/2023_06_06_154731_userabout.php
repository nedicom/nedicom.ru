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
        Schema::table('users', function (Blueprint $table) {
            $table->text('about')->nullable();
            $table->unsignedBigInteger('speciality_one_id')->nullable();
            $table->unsignedBigInteger('speciality_two_id')->nullable();
            $table->unsignedBigInteger('speciality_three_id')->nullable();
            $table->foreign('speciality_one_id')->references('id')->on('uslugis');
            $table->foreign('speciality_two_id')->references('id')->on('uslugis');
            $table->foreign('speciality_three_id')->references('id')->on('uslugis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
