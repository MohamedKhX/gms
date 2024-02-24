<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sport1 = Sport::factory()->create(['name' => 'حديد']);
        $sport2 = Sport::factory()->create(['name' => 'سويدي']);
        $sport3 = Sport::factory()->create(['name' => 'كيك بوكسينج']);
        $sport4 = Sport::factory()->create(['name' => 'MMA']);

        $plan1 = Plan::factory()->create([
            'name' => 'باقة الاقتصادية',
            'price' => 80,
            'price_dollar' => 12,
            'duration' => 30,
            'description' => 'توفر لك هذه الباقة الاقتصادية العديد من المزايا والخدمات التي تساعدك على تحقيق أهدافك بأقل تكلفة ممكنة.',
        ]);

        $plan1->sports()->attach([$sport1->id, $sport2->id]);

        $plan2 = Plan::factory()->create([
            'name'      => 'VIP',
            'price'     => 260,
            'price_dollar' => 35,
            'duration'  => 30,
            'description' => 'توفر لك هذه الباقة جميع الرياضات والخدمات المتوفرة في الصالة بأعلى مستوى من الجودة والراحة.',
        ]);

        $plan2->sports()->attach([$sport1->id, $sport2->id, $sport3->id, $sport4->id]);

        $plan2 = Plan::factory()->create([
            'name' => 'باقة الرياضيات القتالية',
            'price' => 120,
            'price_dollar' => 20,
            'duration' => 30,
            'description' => 'توفر لك هذه الباقة الرياضات القتالية مع أفضل المدربين وأحدث الأجهزة والمعدات.',
        ]);

        $plan2->sports()->attach([$sport3->id, $sport4->id]);
    }
}
