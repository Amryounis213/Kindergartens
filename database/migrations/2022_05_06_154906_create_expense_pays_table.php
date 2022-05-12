<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_pays', function (Blueprint $table) {
            $table->id();
            $table->string('rec_name');
            $table->date('payment_date');
            $table->unsignedFloat('payment_amount')->default(0);
            $table->unsignedBigInteger('Receipt_number')->nullable();
            $table->text('notices')->nullable();
            $table->foreignId('year')->constrained('years')->cascadeOnDelete();
            $table->foreignId('expense_id')->constrained('expenses')->cascadeOnDelete();
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
        Schema::dropIfExists('expense_pays');
    }
}
