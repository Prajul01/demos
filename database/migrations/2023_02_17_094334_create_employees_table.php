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
            $table->string('name');
            $table->string('school_name');
            $table->string('category');
            $table->string('type');
            $table->string('post');
            $table->string('grade');
            $table->string('phone');
            $table->string('gender');
            $table->boolean('marital_status')->default('0');
            $table->string('contact_no');
            $table->string('bank');
            $table->string('account_no');
            $table->string('provident_no');
            $table->string('citizen_inv_no');
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
