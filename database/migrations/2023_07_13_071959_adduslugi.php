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
        Schema::table('uslugis', function (Blueprint $table) {
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
