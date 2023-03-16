<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_type');
            $table->string('logo');
            $table->string('school');
            $table->string('tole');
            $table->string('title_nepali');
            $table->string('est_year');
            $table->string('school_code');
            $table->string('principal_name');
            $table->string('school_email');
            $table->string('school_phone');
            $table->string('ward_no');
            $table->string('school_level');
            $table->boolean('class_eight')->default('0');
            $table->string('enroll_class');
            $table->string('principal_no');
            $table->string('principal_email');
            $table->string('bank_name');
            $table->string('account_no');
            $table->boolean('status')->default(0);
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->boolean('delete_flg')->nullable()->default('0');
            $table->boolean('is_draft')->nullable()->default('0');
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
        Schema::dropIfExists('schools');
    }
};
