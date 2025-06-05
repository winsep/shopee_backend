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
        Schema::create('shipping', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');
        $table->string('tracking_code')->nullable();
        $table->string('shipping_provider')->nullable();
        $table->enum('status', ['pending', 'in_transit', 'delivered', 'failed'])->default('pending');
        $table->timestamp('updated_at')->nullable();

        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
