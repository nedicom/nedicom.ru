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
            $table->boolean('is_main')->nullable();
            $table->unsignedBigInteger('main_usluga_id')->nullable();
            $table->foreign('main_usluga_id')->references('id')->on('uslugis');
        });
    }

    public function down()
    {
        Schema::table('uslugis', function (Blueprint $table) {
            $table->dropColumn('is_main');
            $table->dropForeign('main_usluga_id_foreign'); 
            $table->dropColumn('main_usluga_id');
        });
    }
};
