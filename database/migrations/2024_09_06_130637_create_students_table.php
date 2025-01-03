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
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id');
            $table->string('name');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classses')->onDelete('cascade');
            $table->string('parent');
            $table->string('age');
            $table->float('fee_balance')->nullable();
            $table->string('paid_fee')->nullable();
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
        Schema::drop('students');
    }
};
