<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('label_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('discount_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->smallInteger('min_age');
            $table->smallInteger('min_players');
            $table->smallInteger('max_players');
            $table->boolean('in_stock')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("
            ALTER TABLE products
                ADD CONSTRAINT chk_product_price
                    CHECK (price >= 0),
                ADD CONSTRAINT chk_product_min_age
                    CHECK (min_age >= 0),
                ADD CONSTRAINT chk_product_min_players
                    CHECK (min_players >= 1),
                ADD CONSTRAINT chk_product_max_players
                    CHECK (max_players >= min_players)
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
