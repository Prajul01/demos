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
        Schema::create('employee_allowance_scale', function (Blueprint $table) {
            $table->id();
            $table->string('level')->nullable();
            $table->string('title')->nullable();
            $table->string('area')->nullable();
            $table->string('remark')->nullable();
            $table->string('amount')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->boolean('delete_flg')->nullable()->default('0');
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
        Schema::dropIfExists('employee_allowance_scale');
    }
};
