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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fname_nep');
            $table->string('mname_nep')->nullable();
            $table->string('lname_nep');
            $table->string('fname_eng')->nullable();
            $table->string('mname_eng')->nullable();
            $table->string('lname_eng')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('signal_no')->nullable();
            $table->string('DOB');
            $table->string('gender');
            $table->string('position');
            $table->string('level');
            $table->string('type');
            $table->string('category');
            $table->string('grade');
            $table->string('caste')->nullable();
            $table->string('temp_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('contact_no');
            $table->string('temporary_appointment')->nullable();
            $table->string('permenant_appointment')->nullable();
            $table->string('insurance_no')->nullable();
            $table->string('promotion_date')->nullable();
            $table->string('provident_fund')->nullable();
            $table->string('retire')->nullable();
            $table->string('bank')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('account_no')->nullable();
            $table->string('sequence_no')->nullable();
            $table->string('citizen_investment_no')->nullable();
            $table->string('remark')->nullable();
            $table->string('school_name');
            $table->boolean('marital_status')->default('0');
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('employees');
    }
};
