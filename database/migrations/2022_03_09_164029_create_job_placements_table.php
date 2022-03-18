<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_placements', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->foreignId('kindergarten_id')->constrained('kindergartens')->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->foreignId('job_id')->constrained('jobs')->cascadeOnDelete();
            $table->foreignId('division_id')->nullable()->constrained('divisions')->cascadeOnDelete();
            $table->foreignId('level_id')->nullable()->constrained('levels')->cascadeOnDelete();
            $table->foreignId('period_id')->nullable()->constrained('periods')->cascadeOnDelete();
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
        Schema::dropIfExists('job_placements');
    }
}
