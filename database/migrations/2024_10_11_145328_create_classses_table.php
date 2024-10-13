<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *            $table->string('name'); Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classses', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('teachers');
            $table->string('students');
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
        Schema::drop('classses');
    }
};