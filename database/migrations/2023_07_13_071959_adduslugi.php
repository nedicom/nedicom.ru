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
            $table->text('longdescription')->default('Это детальное описание услуги');
            $table->text('preimushestvo1')->default('600+ дел');
            $table->text('preimushestvo2')->default('Более 10 лет практики');
            $table->text('preimushestvo3')->default('Аналитический подход к решению задачи');
            $table->text('address')->default('Респ. Крым, г. Симферополь, ул. Долгоруковская, 7');
            $table->text('phone')->default('+79788838978');
            $table->text('maps')->default('https://yandex.ru/map-widget/v1/?um=constructor%3Af656829d54430f3c7f23ae0313146d2525f75dfbaffa3e083f51d06d98a33614&amp;source=constructor');
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
