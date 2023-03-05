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
        Schema::create('salarysheet', function (Blueprint $table) {
            $table->id();
            $table->string('fiscalyear');
            $table->string('month');
            $table->string('created_by');
            $table->boolean('status')->default('0');
            $table->string('updated_by')->nullable();
            $table->boolean('delete_flg')->default('0');
            $table->boolean('community_teacher')->default('0');
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
        Schema::dropIfExists('salarysheet');
    }
};
