<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedFloat('price');
            $table->string('year');
            $table->foreignId('subsraction_id')->constrained('subscriptions')->onDelete('cascade');
            $table->boolean('static_fee');
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
        Schema::dropIfExists('year_subscriptions');
    }
}
