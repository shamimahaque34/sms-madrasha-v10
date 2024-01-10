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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('created_by');
            $table->string('username')->nullable()->unique();
            $table->string('name_english')->nullable();
            $table->string('name_bangla')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('salary_grade_id')->nullable();
            $table->string('dob')->nullable();
            $table->string('dob_timestamp')->nullable();
            $table->string('mpo_index_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('male')->nullable();
            $table->string('religion')->nullable();
            $table->string('jod')->nullable();
            $table->string('jod_timestamp')->nullable();
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->string('subject')->nullable();
            $table->string('highest_education')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
