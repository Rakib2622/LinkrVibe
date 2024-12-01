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
    Schema::create('category_custom_fields', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
        $table->string('field_name'); // Custom field name
        $table->string('field_type'); // Field type (e.g., text,image, boolean, dropdown)
        $table->boolean('is_required')->default(false); // Whether field is required
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_custom_fields');
    }
};
