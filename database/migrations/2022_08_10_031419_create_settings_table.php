<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('site_name')->nullable();
            $table->string('system_email')->nullable();
            $table->string('institute_phone')->nullable();
            $table->string('footer')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->tinyInteger('change_language')->default(1)->comment('1 => Enable & 0 => Disable')->nullable();
            $table->string('default_language')->default('English')->nullable();
            $table->string('institute_division')->nullable();
            $table->string('institute_district')->nullable();
            $table->text('institute_address')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_banner')->nullable();
            $table->text('site_meta')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
