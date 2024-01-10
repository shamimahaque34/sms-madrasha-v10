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
        Schema::table('quran_translations', function (Blueprint $table) {
            $table
                ->foreign('quran_chapter_id')
                ->references('id')
                ->on('quran_chapters')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('quran_verse_id')
                ->references('id')
                ->on('quran_verses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('quran_translation_provider_id')
                ->references('id')
                ->on('quran_translation_providers')
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
        Schema::table('quran_translations', function (Blueprint $table) {
            $table->dropForeign(['quran_chapter_id']);
            $table->dropForeign(['quran_verse_id']);
            $table->dropForeign(['quran_translation_provider_id']);
        });
    }
};
