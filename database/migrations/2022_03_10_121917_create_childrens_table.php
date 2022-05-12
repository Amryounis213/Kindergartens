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
            $table->string('identity')->unique();
            $table->string('name');
            $table->date('bth_date');
            $table->date('add_date');

            $table->foreignId('father_id')->nullable()->constrained('fathers')->cascadeOnDelete();
            $table->foreignId('father_rel')->nullable()->constrained('father_relations')->cascadeOnDelete();

            $table->foreignId('kindergarten_id')->nullable()->constrained('kindergartens')->cascadeOnDelete();
            $table->enum('gender' , [1 ,2]);
            $table->foreignId('added_by')->constrained('users')->cascadeOnDelete();
            $table->boolean('status');
            $table->boolean('want_transport');

            $table->string('mother_name')->nullable();
            $table->string('mother_mob')->nullable();
            $table->string('address')->nullable();



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
