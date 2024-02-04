<?php

use App\Models\shopping\CarOrder;
use App\Models\shopping\Product;
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
        Schema::create('car_items', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();
            $table->decimal('total', 10, 2);
            $table->unsignedBigInteger('quantity');
            $table->timestamps();
            $table->foreignIdFor(CarOrder::class, 'car_order_id');
            $table->foreignIdFor(Product::class, 'product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_items');
    }
};
