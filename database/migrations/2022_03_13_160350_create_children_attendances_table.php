<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_attendances', function (Blueprint $table) {
            $table->id();

            $table->date('attendence_date');
            $table->boolean('attendence_status');
            $table->timestamps();
            
            $table->foreignId('children_id')->constrained('childrens')->onDelete('cascade');
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('kindergarten_id')->constrained('kindergartens')->onDelete('cascade');
            $table->foreignId('period_id')->nullable()->constrained('periods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children_attendances');
    }
}
