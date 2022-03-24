<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_fees', function (Blueprint $table) {
            $table->id();

            $table->date('payment_date');
            $table->unsignedFloat('payment_amount')->default(0);
            $table->unsignedBigInteger('Receipt_number')->nullable();
            $table->text('notices')->nullable();
            $table->string('year');
            $table->foreignId('children_id')->constrained('childrens')->cascadeOnDelete();
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
        Schema::dropIfExists('pay_fees');
    }
}
