<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quran_verses', function (Blueprint $table) {
            $table
                ->foreign('quran_chapter_id')
                ->references('id')
                ->on('quran_chapters')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('quran_font_id')
                ->references('id')
                ->on('quran_fonts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quran_verses', function (Blueprint $table) {
            $table->dropForeign(['quran_chapter_id']);
            $table->dropForeign(['quran_font_id']);
        });
    }
};
