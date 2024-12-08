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
    Schema::table('orders', function (Blueprint $table) {
        // Allow nullable foreign keys
        $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('cascade');
        $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        // Drop the foreign key columns
        $table->dropForeign(['country_id']);
        $table->dropForeign(['city_id']);
        $table->dropColumn(['country_id', 'city_id']);
    });
}

};
