<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    // What percentage of products should get a discount
    private const DISCOUNT_RATIO = 0.15;

    public function run(): void
    {
        $discounts = [
            [
                'type'      => 'percentage',
                'value'     => 10,
                'starts_at' => null,
                'ends_at'   => null,
            ],
            [
                'type'      => 'percentage',
                'value'     => 20,
                'starts_at' => now()->subDays(3),
                'ends_at'   => now()->addDays(30),
            ],
            [
                'type'      => 'percentage',
                'value'     => 15,
                'starts_at' => now()->subDays(7),
                'ends_at'   => now()->addDays(14),
            ],
            [
                'type'      => 'fixed',
                'value'     => 5,
                'starts_at' => null,
                'ends_at'   => null,
            ],
            [
                'type'      => 'fixed',
                'value'     => 10,
                'starts_at' => now()->subDay(),
                'ends_at'   => now()->addDays(21),
            ],
        ];

        $createdDiscounts = [];

        foreach ($discounts as $data) {
            $createdDiscounts[] = Discount::create($data);
        }

        $this->command->info('✓ Discounts created: ' . count($createdDiscounts));

        // Assign discounts to a random subset of products
        $products     = Product::all();
        $sampleSize   = (int) ceil($products->count() * self::DISCOUNT_RATIO);
        $sampled      = $products->shuffle()->take($sampleSize);

        foreach ($sampled as $product) {
            $randomDiscount = $createdDiscounts[array_rand($createdDiscounts)];
            $product->update(['discount_id' => $randomDiscount->id]);
        }

        $this->command->info("✓ Discounts assigned to {$sampleSize} products.");
    }
}
