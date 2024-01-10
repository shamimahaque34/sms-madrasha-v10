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
        Schema::create('quran_verses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quran_chapter_id');
            $table->unsignedBigInteger('quran_font_id');
            $table->text('verse_arabic')->nullable();
            $table->text('verse_bangla')->nullable();
            $table->text('verse_english')->nullable();
            $table->string('audio')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('quran_verses');
    }
};
