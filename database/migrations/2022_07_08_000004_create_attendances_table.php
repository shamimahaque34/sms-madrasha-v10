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
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('academic_class_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table
                ->enum('month', [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December',
                ])
                ->nullable();
            $table->date('date')->nullable();
            $table->date('date_timestamp')->nullable();
            $table->unsignedBigInteger('attendanceable_id');
            $table->string('attendanceable_type');

            $table->index('attendanceable_id');
            $table->index('attendanceable_type');

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
        Schema::dropIfExists('attendances');
    }
};
