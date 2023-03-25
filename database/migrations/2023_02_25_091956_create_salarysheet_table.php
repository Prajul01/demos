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
            $table->string('fiscalyear')->nullable();
            $table->string('month')->nullable();
            $table->string('header')->nullable();
            $table->string('created_by')->nullable();
            $table->boolean('status')->nullable()->default('0');
            $table->string('updated_by')->nullable();
            $table->boolean('delete_flg')->nullable()->default('0');
            $table->boolean('community_teacher')->nullable()->default('0');
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
