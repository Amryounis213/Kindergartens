<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->date('payment_date');
            $table->unsignedFloat('payment_amount')->default(0);
            $table->foreignId('children_id')->constrained('childrens')->cascadeOnDelete();
            $table->enum('status' , ['paid' , 'unpaid'])->default('unpaid');
            $table->text('notices')->nullable();
            $table->unsignedFloat('paid_amount')->default(0);
            $table->string('year')->nullable();
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
        Schema::dropIfExists('installments');
    }
}
