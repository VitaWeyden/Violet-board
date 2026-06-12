<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BoxCollectLocation;



class BoxCollectLocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['name' => 'Bratislava - Avion', 'address' => 'Ivanská cesta 16, 821 04 Bratislava'],
            ['name' => 'Košice - Aupark', 'address' => 'Námestie osloboditeľov 1, 040 01 Košice'],
            ['name' => 'Žilina - OC Mirage', 'address' => 'Námestie A. Hlinku 7B, 010 01 Žilina'],
            ['name' => 'Kopčany', 'address' => 'Kollárova, 90848 Kopčany'],
            ['name' => 'Skalica - Farby-Laky', 'address' => 'Mallého 1218/14, 90901 Skalica'],
            ['name' => 'Malacky - Záhorácka', 'address' => 'Záhorácka 53, 90101 Malacky'],
            ['name' => 'Zohor', 'address' => 'Struhárova ulica 2, 90051 Zohor'],
            ['name' => 'Smolenice', 'address' => 'Trnavská 584/12, 91904'],
            ['name' => 'Diakovce', 'address' => '459, 92581 Diakovce'],
            ['name' => 'Komárno', 'address' => 'Hadovská cesta 3913, 94501 Komárno'],
        ];

        foreach ($locations as $loc) {
            \App\Models\BoxCollectLocation::firstOrCreate(
                ['name' => $loc['name']],
                ['address' => $loc['address']]
            );
        }
    }
}
