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
        Schema::create('magh_form_setting', function (Blueprint $table) {
            $table->id();
            $table->string('fiscalyear')->nullable();
            $table->string('name')->nullable();
            $table->string('nagarTeacher')->nullable();
            $table->string('state')->nullable();
            $table->string('header')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('magh_form_setting');
    }
};
