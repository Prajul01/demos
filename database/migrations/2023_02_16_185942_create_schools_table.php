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
            $table->string('name');
            $table->string('title_nepali')->nullable();
            $table->string('school_code')->nullable();
            $table->string('school_email')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('class')->nullable();
            $table->string('enroll_class')->nullable();
            $table->string('logo')->nullable();
            $table->string('moto')->nullable();
            $table->string('tole')->nullable();
            $table->string('establish_year')->nullable();
            $table->string('account');
            $table->string('type');
            $table->string('principal');
            $table->string('principal_phone')->nullable();
            $table->string('principal_email')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('code');
            $table->string('address');
            $table->string('est_year');
            $table->string('status');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->boolean('delete_flg')->default('0');
            $table->boolean('is_draft')->default('0');
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
