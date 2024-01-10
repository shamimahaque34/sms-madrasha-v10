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
        Schema::create('user_submitted_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file')->nullable();
            $table->string('file_type')->nullable();
            $table->unsignedBigInteger('user_submitted_certificateable_id');
            $table->string('user_submitted_certificateable_type');

            $table->index('user_submitted_certificateable_id', 'user_submitted_certificateable_id');
            $table->index('user_submitted_certificateable_type', 'user_submitted_certificateable_type');

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
        Schema::dropIfExists('user_submitted_certificates');
    }
};
