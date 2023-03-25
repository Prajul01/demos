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
        Schema::create('fiscalyear', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('created_by')->nullable();
            $table->date('from_date_eng')->nullable();
            $table->date('to_date_eng')->nullable();
            $table->date('from_date_nep')->nullable();
            $table->date('to_date_nep')->nullable();
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
        Schema::dropIfExists('fiscalyear');
    }
};
