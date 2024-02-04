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
            $table->unsignedDecimal('total_rating', $precision = 8, $scale = 2)->default(0);
            $table->unsignedDecimal('pub_rating', $precision = 8, $scale = 2)->default(0);
            $table->unsignedDecimal('question_rating', $precision = 8, $scale = 2)->default(0);
            $table->unsignedDecimal('answer_rating', $precision = 8, $scale = 2)->default(0);
            $table->unsignedDecimal('practice_rating', $precision = 8, $scale = 2)->default(0);            
            $table->unsignedBigInteger('posts_days')->nullable();
            $table->unsignedBigInteger('question_days')->nullable();
            $table->unsignedBigInteger('answer_days')->nullable();
            $table->unsignedBigInteger('practice_days')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('total_rating');
            $table->dropColumn('pub_rating');
            $table->dropColumn('question_rating');
            $table->dropColumn('answer_rating');
            $table->dropColumn('practice_rating');
            $table->dropColumn('posts_days');
            $table->dropColumn('question_days');
            $table->dropColumn('answer_days');
            $table->dropColumn('practice_days');
        });
    }
};
