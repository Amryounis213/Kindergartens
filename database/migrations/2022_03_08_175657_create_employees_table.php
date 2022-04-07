<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('identity' , 11);
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->enum('gender',[1 , 2]);
            $table->string('address')->nullable();
           


            $table->foreignId('kindergartens')->constrained('kindergartens')->cascadeOnDelete();
            $table->foreignId('major_id')->constrained('majors')->cascadeOnDelete();

            $table->boolean('status')->nullable();
            $table->date('bth_date');
            $table->date('add_date');
            $table->foreignId('added_by')->constrained('users' , 'id')->cascadeOnDelete();
            $table->string('notice')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
