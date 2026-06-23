<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            LabelSeeder::class,
            ProductSeeder::class, // assigns label_id at the end
            DiscountSeeder::class, // assigns discount_id after products exist
        ]);
    }
}
