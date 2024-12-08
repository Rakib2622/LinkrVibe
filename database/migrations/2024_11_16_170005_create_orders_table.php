<?php

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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('customer_email');
        $table->string('customer_phone');
        $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('cascade');
        $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('cascade');
        $table->string('zipcode');
        $table->text('address');
        $table->string('order_number')->unique(); // Unique order identifier
        $table->decimal('total_price', 8, 2); // Total price of the order
        $table->string('status')->default('pending'); // Order status: pending, completed, failed
        $table->json('payment_details')->nullable(); // JSON to store payment details (Stripe, etc.)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
