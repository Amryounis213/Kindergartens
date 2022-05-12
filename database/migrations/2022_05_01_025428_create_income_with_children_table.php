<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeWithChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_with_children', function (Blueprint $table) {
            $table->id();
            $table->unsignedFloat('price');
            $table->foreignId('year')->constrained('years')->onDelete('cascade');
            $table->foreignId('income_id')->constrained('incomes')->onDelete('cascade');
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
        Schema::dropIfExists('income_with_children');
    }
}
