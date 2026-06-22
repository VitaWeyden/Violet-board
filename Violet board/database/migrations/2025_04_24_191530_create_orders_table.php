<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->string('delivery_method', 50);
            $table->string('payment_method', 50);
            $table->decimal('total_price', 8, 2);
            $table->string('street', 200);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("
            ALTER TABLE orders
                ADD CONSTRAINT chk_order_total_price
                    CHECK (total_price >= 0)
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
