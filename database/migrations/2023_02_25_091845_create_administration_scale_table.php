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
        Schema::create('administration_scale', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->string('amount');
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
        Schema::dropIfExists('administration_scale');
    }
};