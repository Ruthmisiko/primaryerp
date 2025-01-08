<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('results', function (Blueprint $table) {
            $table->integer('class_id')->after('exam_id'); // Add the class_id column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            
        });
    }
    
};
