<?php

use App\Enums\PaymentMethod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trainee_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainee_id')->references('id')->on('trainees');
            $table->foreignId('plan_id')->references('id')->on('plans');
            $table->integer('duration');
            $table->integer('price')->nullable();
            $table->integer('price_dollar')->nullable();
            $table->date('start_date');
            $table->date('end_date');

            $table->enum('payment_method', PaymentMethod::values())->default(PaymentMethod::CASH->value);

            $table->boolean('is_cancelled')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
