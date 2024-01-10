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
        Schema::create('quran_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quran_chapter_id');
            $table->unsignedBigInteger('quran_verse_id');
            $table->unsignedBigInteger('quran_translation_provider_id');
            $table->text('translated_verse')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quran_translations');
    }
};
