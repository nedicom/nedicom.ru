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
        if (Schema::hasColumn('images','user_id')) {
            // The "users" table exists and has an "email" column...
        }
        else{
            Schema::create('images', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('name')->nullable();
                $table->string('file_path')->nullable();
                $table->string('ext')->nullable();
                $table->integer('size')->nullable();
                $table->timestamps();
            });
        }

        Schema::table('users', function (Blueprint $table) {            
            $table->string('file_path')->default('/storage/images/landing/main/default.webp');                       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('file_path');
            });
    }
    
};
