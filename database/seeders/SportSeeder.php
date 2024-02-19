<?php

namespace Database\Seeders;

use App\Models\Sport;
use Database\Factories\SportFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = ['حديد', 'بوكسنق', 'سباحة', 'كورة'];

        foreach ($sports as $sport) {
            Sport::factory()->create([
                'name' => $sport,
            ]);
        }
    }
}
