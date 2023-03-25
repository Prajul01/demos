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
            $table->string('school_type')->nullable();
            $table->string('logo')->nullable();
            $table->string('school')->nullable();
            $table->string('tole')->nullable();
            $table->string('title_nepali')->nullable();
            $table->string('est_year')->nullable();
            $table->string('school_code')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('school_email')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('school_level')->nullable();
            $table->boolean('class_eight')->default('0');
            $table->string('enroll_class')->nullable();
            $table->string('principal_no')->nullable();
            $table->string('principal_email')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->boolean('status')->default(0);
            $table->string('created_by')->nullable();
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
