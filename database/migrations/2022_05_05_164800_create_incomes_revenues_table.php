<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes_revenues', function (Blueprint $table) {
            $table->id();

            $table->date('payment_date');
            $table->unsignedFloat('payment_amount')->default(0);
            $table->unsignedBigInteger('Receipt_number')->nullable();
            $table->text('notices')->nullable();
            $table->foreignId('year')->constrained('years')->cascadeOnDelete();
            $table->foreignId('children_id')->nullable()->constrained('childrens')->cascadeOnDelete();
            $table->foreignId('income_id')->constrained('incomes')->cascadeOnDelete();

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
        Schema::dropIfExists('incomes_revenues');
    }
}
