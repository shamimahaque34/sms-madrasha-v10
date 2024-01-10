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
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('educational_stage_id');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('student_group_id');
            $table->unsignedBigInteger('academic_class_id');
            $table->string('subject_name');
            $table->string('subject_type')->comment('1 => optional; 2 => mandatory')->nullable();
            $table->integer('pass_mark')->default(10)->nullable();
            $table->integer('final_mark')->default(100)->nullable();
            $table->smallInteger('point')->nullable();
            $table->string('subject_author')->nullable();
            $table->string('subject_code')->nullable();
            $table->text('subject_book_image')->nullable();
            $table->tinyInteger('is_for_graduation')->default(0)->nullable();
            $table->tinyInteger('is_main_subject')->default(0)->nullable();
            $table->tinyInteger('is_optional')->default(0)->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('subjects');
    }
};
