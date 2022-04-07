<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('level_id')->constrained('levels' ,'id')->cascadeOnDelete();
            $table->foreignId('kindergarten_id')->constrained('kindergartens' ,'id')->cascadeOnDelete();
           // $table->foreignId('period_id')->constrained('periods' ,'id')->cascadeOnDelete();
          //  $table->foreignId('nursemaid_id')->constrained('employee' ,'id')->nullOnDelete();
            $table->unsignedInteger('max_children')->default(0);
            $table->boolean('status');
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
        Schema::dropIfExists('divisions');
    }
}
