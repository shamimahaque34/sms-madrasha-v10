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
        Schema::create('quran_chapters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('arabic_name')->nullable();
            $table->string('bangla_name');
            $table->string('english_name');
            $table->string('chapter_serial')->nullable();
            $table->string('total_verse')->nullable();
            $table->tinyInteger('surah_origin')->comment('1 => Makki , 2 => Madani')->nullable();
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
        Schema::dropIfExists('quran_chapters');
    }
};
