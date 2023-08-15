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
        Schema::create('objavleniya', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('obj_name');
            $table->string('obj_desc')->default('Нет описания');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('url')->unique();
            $table->text('longdescription')->nullable();
            $table->text('preimushestvo1')->nullable();
            $table->text('preimushestvo2')->nullable();
            $table->text('preimushestvo3')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('maps')->nullable();
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
