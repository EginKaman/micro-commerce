<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('orders', static function (Blueprint $table): void {
            $table->id();
            $table->string('status');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('delivery');
            $table->string('payment');
            $table->float('total_price');
            $table->timestamps();
        });

        Schema::create('order_product', static function (Blueprint $table): void {
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnUpdate();
            $table->integer('quantity');
            $table->decimal('price');

            $table->primary(['order_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_product');
    }
};
