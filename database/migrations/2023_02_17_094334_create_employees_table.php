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
            $table->string('mname_nep') ;
            $table->string('lname_nep');
            $table->string('fname_eng') ;
            $table->string('mname_eng') ;
            $table->string('lname_eng') ;
            $table->string('father_name') ;
            $table->string('mother_name') ;
            $table->string('signal_no') ;
            $table->string('DOB');
            $table->string('gender');
            $table->string('position');
            $table->string('level');
            $table->string('type');
            $table->string('category');
            $table->string('grade');
            $table->string('caste') ;
            $table->string('temp_address') ;
            $table->string('permanent_address') ;
            $table->string('contact_no');
            $table->string('temporary_appointment') ;
            $table->string('permenant_appointment') ;
            $table->string('insurance_no') ;
            $table->string('promotion_date') ;
            $table->string('provident_fund') ;
            $table->string('retire') ;
            $table->string('bank') ;
            $table->string('pan_no') ;
            $table->string('account_no') ;
            $table->string('sequence_no') ;
            $table->string('citizen_investment_no') ;
            $table->string('remark') ;
            $table->string('school_name');
            $table->boolean('marital_status')->default('0');
            $table->boolean('status')->default('0');
            $table->string('created_by');
            $table->string('updated_by')->nullable() ;
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
        Schema::dropIfExists('employees');
    }
};
