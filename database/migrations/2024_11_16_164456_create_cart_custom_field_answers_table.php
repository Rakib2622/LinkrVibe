<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cart_custom_field_answers', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
        $table->foreignId('field_id')->constrained('category_custom_fields')->onDelete('cascade');
        $table->text('answer_text')->nullable(); // Text answer
        $table->string('answer_image')->nullable(); // Image path for image answer
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_custom_field_answers');
    }
};
