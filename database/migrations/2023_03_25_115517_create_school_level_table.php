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
        Schema::create('school_level', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('amount')->nullable();
            $table->string('remark')->nullable();
            $table->string('form_name')->nullable();
            $table->string('form_type')->nullable();
            $table->string('report')->nullable();
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
        Schema::dropIfExists('school_level');
    }
};
