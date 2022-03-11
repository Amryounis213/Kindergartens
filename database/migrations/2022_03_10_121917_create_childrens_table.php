<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('age');
            $table->date('bth_date');
            $table->foreignId('father_id')->constrained('fathers')->cascadeOnDelete();
            $table->foreignId('kindergarten_id')->constrained('kindergartens')->cascadeOnDelete();
            $table->enum('gender' , [1 ,2]);
            $table->foreignId('added_by')->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('childrens');
    }
}
