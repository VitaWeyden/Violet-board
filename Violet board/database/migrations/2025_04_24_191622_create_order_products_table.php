<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
            $table->smallInteger('quantity');
            $table->timestamp('created_at')->useCurrent();

            $table->unique(['order_id', 'product_id']);
        });

        DB::statement("
            ALTER TABLE order_products
                ADD CONSTRAINT chk_order_product_quantity
                    CHECK (quantity > 0)
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
