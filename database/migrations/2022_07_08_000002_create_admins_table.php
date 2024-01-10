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
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name_english')->nullable();
            $table->string('name_bangla')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('dob')->nullable();
            $table->string('dob_timestamp')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('male')->nullable();
            $table->string('religion')->default('islam')->nullable();
            $table->text('image')->nullable();
            $table->text('address')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 => published; 2 => unpublished')->nullable();
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
        Schema::dropIfExists('admins');
    }
};
